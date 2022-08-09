<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;
use function redirect;
use function view;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;

class ProductController extends Controller
{
    private $productService;
    private $categoryService;

    public function __construct(
        ProductService $productService,
        CategoryService $categoryService
    ) {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $categories = $this->categoryService->getBytype([config('consts.category.type.product.value')]);
        view()->share(['categories' => $categories]);
    }

    public function index(Request $request)
    {
        $products = $this->productService->getPaginate();
        if ($request->keyword && $request->category_id) {
            $products = $this->productService->searchAndFilter($request);
        } else if ($request->category_id) {
            $products = $this->productService->filter($request);
        } else if ($request->keyword) {
            $products = $this->productService->search($request);
        }
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $this->productService->create($request);
        return Redirect(route('admin.products.index'))->with('success', 'Thêm tác phẩm thành công');
    }

    public function show($id)
    {
        $product = $this->productService->getById($id);
        $productImgs = $product->image ?  explode("|", $product->image) : null;
        return view('admin.products.show', compact('product', 'productImgs'));
    }

    public function edit($id)
    {
        $product = $this->productService->getById($id);
        $productOfCategories = $product->categories;
        $productImg = explode("|", $product->image)[0];
        return view('admin.products.edit', compact('product', 'productImg', 'productOfCategories'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $this->productService->update($request, $id);
        return Redirect(route('admin.products.index'))->with('success', 'Cập nhật tác phẩm thành công');
    }

    public function destroy($id)
    {
        $product = $this->productService->delete($id);
        return response()->json(['product' => $product, 'message' => 'Xóa tác phẩm thành công']);
    }
}
