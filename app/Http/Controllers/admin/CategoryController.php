<?php

namespace App\Http\Controllers\Admin;

use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $categoryReferences = $this->categoryService->getParentBytype([config('consts.category.type.post.value'), config('consts.category.type.post_reference.value')]);
        view()->share([
            'categoryReferences' => $categoryReferences,
        ]);
    }

    public function index(Request $request)
    {
        $categories = $this->categoryService->getPaginate();
        if ($request->keyword) {
            $categories = $this->categoryService->search($request);
        }
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->categoryService->create($request);
        return Redirect(route('admin.categories.index'))->with('success', 'Thêm mục lục thành công');
    }

    public function edit($id)
    {
        $category = $this->categoryService->getById($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(StoreCategoryRequest $request, $id)
    {
        $this->categoryService->update($request, $id);
        return Redirect(route('admin.categories.index'))->with('success', 'Câp nhật mục lục thành công');
    }

    public function destroy($id)
    {
        $category = $this->categoryService->delete($id);
        return response()->json(['category' => $category, 'message' => 'Xóa mục lục thành công']);
    }
}
