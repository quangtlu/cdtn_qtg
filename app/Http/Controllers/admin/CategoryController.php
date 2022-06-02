<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Components\Recusive;

class CategoryController extends Controller
{    
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getPaginate();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $data = $this->categoryService->getAll();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive();
        return view('admin.categories.create', compact('htmlOption'));
    }

    public function store(Request $request)
    {
        $this->categoryService->create($request);
        return Redirect(route('admin.categories.index'))->with('success', 'Thêm danh mục thành công');
    }

    public function show(Category $category)
    {
        
    }

    public function edit($id)
    {
        $category = $this->categoryService->getById($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->categoryService->update($request, $id);
        return Redirect(route('admin.categories.index'))->with('success', 'Câp nhật danh mục thành công');
    }

    public function destroy($id)
    {
        $this->categoryService->delete($id);
        return Redirect(route('admin.categories.index'));
    }
}
