<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AuthorService;
use App\Services\CategoryService;
use App\Services\OwnerService;

class ProductController extends Controller
{
    private $productService;
    private $categoryService;
    private $authorService;
    private $ownerService;

    public function __construct(
        ProductService $productService,
        CategoryService $categoryService,
        AuthorService $authorService,
        OwnerService $ownerService
    ) {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->authorService = $authorService;
        $this->ownerService = $ownerService;

        $categories = $this->categoryService->getParentBytype([config('consts.category.type.product.value')]);
        $authors = $this->authorService->getAll();
        $owners = $this->ownerService->getAll();
        view()->share(['categories' => $categories, 'authors' => $authors, 'owners' => $owners]);
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
        try {
            $this->productService->create($request);
            return Redirect(route('admin.products.index'))->with(
                'success',
                config('consts.message.success.create')
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function show($id)
    {
        try {
            $product = $this->productService->getById($id);
            $productImgs = $product->image ?  explode("|", $product->image) : null;
            return view('admin.products.show', compact('product', 'productImgs'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function edit($id)
    {
        try {
            $product = $this->productService->getById($id);
            $productOfCategories = $product->categories;
            $productImg = explode("|", $product->image)[0];
            return view('admin.products.edit', compact('product', 'productImg', 'productOfCategories'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function update(UpdateProductRequest $request, $id)
    {
        try {
            $this->productService->update($request, $id);
            return Redirect(route('admin.products.index'))->with(
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
            $product = $this->productService->delete($id);
            return response()->json([
                'product' => $product, 'message' => config('consts.message.success.delete')
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }
}
