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

    public function getPaginate()
    {
        $categories = $this->categoryModel->latest()->paginate(10);
        return $categories;
    }

    public function getByPopular($limit)
    {
        return Category::parent()->type([config('consts.category.type.post_reference.value')])->limit($limit)->get();
    }

    public function search($request)
    {
        $categories = Category::search($request->keyword)->paginate(10);
        return $categories;
    }

    public function getAll()
    {
        $categories = $this->categoryModel->all();
        return $categories;
    }

    public function getById($id)
    {
        $category = $this->categoryModel->findOrFail($id);
        return $category;
    }

    public function create($request)
    {
        $data = [
            "name" => $request->name,
            "parent_id" => $request->parent_id,
            "type" => $request->type,
        ];
        $this->categoryModel->create($data);
    }

    public function update($request, $id)
    {
        $category = $this->getById($id);
        $data = [
            "name" => $request->name,
            "parent_id" => $request->parent_id,
            "type" => $request->type,
        ];
        $category->update($data);
    }

    public function delete($id)
    {
        return $this->categoryModel->destroy($id);
    }

    public function getParentBytype($type)
    {
        return Category::parent()->type($type)->get();
    }
}
