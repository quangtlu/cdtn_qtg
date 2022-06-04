<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Services\AuthorService;
use App\Services\OwnerService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use function redirect;
use function view;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService, OwnerService $ownerService, AuthorService $authorService)
    {
        $this->productService = $productService;
        $this->ownerService = $ownerService;
        $this->authorService = $authorService;
        $authors = $this->authorService->getAll();
        $owners = $this->ownerService->getAll();
        view()->share(['authors' => $authors, 'owners' => $owners]);
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
        $productOfAuthors = $product->author;
        $productImg = explode("|", $product->image)[0];
        return view('admin.products.edit', compact('product', 'productOfAuthors', 'productImg'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $this->productService->update($request, $id);
        return Redirect(route('admin.products.index'))->with('success', 'Cập nhật tác phẩm thành công');
    }

    public function destroy($id)
    {
        $this->productService->delete($id);
    }
}
