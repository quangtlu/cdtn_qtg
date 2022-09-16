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
        try {
            $categories = $this->categoryService->getPaginate();
            if ($request->keyword) {
                $categories = $this->categoryService->search($request);
            }
            return view('admin.categories.index', compact('categories'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        try {
            $this->categoryService->create($request);
            return Redirect(route('admin.categories.index'))->with(
                'success',
                config('consts.message.success.create')
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function edit($id)
    {
        try {
            $category = $this->categoryService->getById($id);
            return view('admin.categories.edit', compact('category'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function update(StoreCategoryRequest $request, $id)
    {
        try {
            $this->categoryService->update($request, $id);
            return Redirect(route('admin.categories.index'))->with(
                'success',
                config('consts.message.success.update')
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function destroy($id)
    {
        try {
            $category = $this->categoryService->delete($id);
            return response()->json([
                'category' => $category, 'message' => config('consts.message.success.delete')
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }
}
