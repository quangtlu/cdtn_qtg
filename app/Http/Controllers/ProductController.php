<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getPaginate();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $this->productService->create($request);
        return Redirect(route('admin.products.index'));
    }

    public function edit($id)
    {
        $product = $this->productService->getById($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $this->productService->update($request, $id);
        return Redirect(route('admin.products.index'));
    }

    public function destroy($id)
    {
        $this->productService->delete($id);
        return Redirect(route('admin.products.index'));
    }
}
