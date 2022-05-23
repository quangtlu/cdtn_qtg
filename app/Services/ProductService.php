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

    public function getById($id){
        $product = $this->productModel->findOrFail($id);   
        return $product; 
    }

    public function create($request){
        $data = [
            "name" => $request->name,
            "pub_date" => $request->pub_date,
            "regis_date" => $request->regis_date,
            "owner_id" => $request->owner_id,
        ];
        $this->productModel->create($data);
    }

    public function update($request, $id){
        $author = $this->getById($id);
        $data = [
            "name" => $request->name,
            "pub_date" => $request->pub_date,
            "regis_date" => $request->regis_date,
            "owner_id" => $request->owner_id,
        ];
        $author->update($data);
    }

    public function delete($id){
        $this->productModel->destroy($id);
    }
}
