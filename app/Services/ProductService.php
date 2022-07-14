<?php

namespace App\Services;
use App\Models\Product;

class ProductService

{
    private $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function getPaginate(){
        $products = Product::latest()->paginate(10);
        return $products;
    }

    public function search($request)
    {
        $products = Product::search($request->keyword)->paginate(10);
        return $products;
    }

    public function getById($id){
        $product = $this->productModel->findOrFail($id);   
        return $product; 
    }

    public function create($request){
        $data = [
            "name" => $request->name,
            "pub_date" => date('Y-m-d', strtotime(str_replace('/', '-', $request->pub_date))),
            "regis_date" => date('Y-m-d', strtotime(str_replace('/', '-', $request->regis_date))),
            "owner_id" => $request->owner_id,
            "categoryIds" => $request->categoryIds,
            "description" => $request->description,
        ];
        if($files=$request->file('image')){
                $images=array();
                foreach($files as $file){
                    $name=$file->getClientOriginalName();
                    $file->move('image/products',$name);
                    $images[]=$name;
                }
                $data['image'] = implode("|",$images);
                
        } else {
            $data['image'] = null;
        }
        $product = $this->productModel->create($data);
        $product->authors()->attach($request->author_id);
        $product->categories()->attach($request->categoryIds);
    }

    public function update($request, $id){
        $product = $this->getById($id);
        $data = [
            "name" => $request->name,
            "pub_date" => date('Y-m-d', strtotime(str_replace('/', '-', $request->pub_date))),
            "regis_date" => date('Y-m-d', strtotime(str_replace('/', '-', $request->regis_date))),
            "owner_id" => $request->owner_id,
            "categoryIds" => $request->categoryIds,
            "description" => $request->description,
        ];

        if($files=$request->file('image')){
                $images=array();
                foreach($files as $file){
                    $name=$file->getClientOriginalName();
                    $file->move('image/products',$name);
                    $images[]=$name;
                }
                $data['image'] = implode("|",$images);
        }
        $product->update($data);
        $product->authors()->sync($request->author_id);
        $product->categories()->sync($request->categoryIds);
    }

    public function delete($id){
        $product = $this->getById($id);
        $this->productModel->destroy($id);
        $product->authors()->detach();
        $product->categories()->detach();
    }

    public function filter($request)
    {
        $products = Product::query()->filterOwner($request)->filterCategory($request)->filterAuthor($request)->paginate(10);
        return $products;
    }

    public function searchAndFilter($request)
    {
        $products = Product::query()->filterOwner($request)->filterCategory($request)->filterAuthor($request)->search($request->keyword)->paginate(10);
        return $products;
    }

    public function getProductHome()
    {
        $products = Product::orderBy('created_at', 'DESC')->limit(3)->get();
        return $products;
    }

    public function getProductIdRelateByTable($productId, array $relateTables)
    {
        $productIds = [];
        foreach ($relateTables as $relateTable) {
            $tableCollections = $this->getById($productId)->$relateTable;
            if ($tableCollections->count() > 0) {
                foreach ($tableCollections as $item) {
                    foreach ($item->products as $product) {
                        if($product->id != $productId) {
                            array_push($productIds, $product->id);
                        }
                    }
                }
            }
        }
        return $productIds;
    }

    public function getProductRelate($id)
    {
        $productIds = $this->getProductIdRelateByTable($id, ['categories', 'authors']);
        return Product::whereIn('id', $productIds)->paginate(5);
    }

    public function sortProductPublicRegisDate($sort)
    {
        if($sort == 'sort-public-date') {
            $products = Product::orderBy('pub_date', 'desc')->paginate(10);
        } else {
            $products = Product::orderBy('regis_date', 'desc')->paginate(10);
        }
        return $products;
    }
}
