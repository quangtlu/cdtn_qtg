<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Http\Controllers\Controller;
use App\Services\TypeService;

class CategoryController extends Controller
{    
    private $categoryService;
    private $typeService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getPaginate();
        return view('admin.categories.index', compact('categories'));
    }

    public function search(Request $request)
    {
        $categories = $this->categoryService->search($request);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.categories.create', compact('htmlOption'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->categoryService->create($request);
        return Redirect(route('admin.categories.index'))->with('success', 'Thêm danh mục thành công');
    }

    public function getType(Request $request) {
        $category_id = $request->category_id;
        $type = $this->categoryService->getById($category_id)->type;
        $htmlOption = "<option value='$type'>$type</option>";
        return $htmlOption;
    }

    public function getCategory($parentId)
    {
        $data = $this->categoryService->getAll();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function edit($id)
    {
        $category = $this->categoryService->getById($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.categories.edit', compact('category', 'htmlOption'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $this->categoryService->update($request, $id);
        return Redirect(route('admin.categories.index'))->with('success', 'Câp nhật danh mục thành công');
    }

    public function destroy($id)
    {
        $this->categoryService->delete($id);
    }
}
