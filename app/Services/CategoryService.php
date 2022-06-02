<?php

namespace App\Services;

use App\Models\Category;

class CategoryService

{
    private $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function getPaginate(){
        $categories = $this->categoryModel->latest()->paginate(10);
        return $categories;
    }

    public function getAll()
    {
        $categories = $this->categoryModel->all();
        return $categories;
    }

    public function getById($id){
        $category = $this->categoryModel->findOrFail($id);   
        return $category; 
    }

    public function create($request){
        $data = [
            "name" => $request->name,
            "parent_id" => $request->parent_id,
        ];
        $this->categoryModel->create($data);
    }

    public function update($request, $id){
        $category = $this->getById($id);
        $data = [
            "name" => $request->name,
            "parent_id" => $request->parent_id,
        ];
        $category->update($data);
    }

    public function delete($id){
        $this->categoryModel->destroy($id);
    }
}
