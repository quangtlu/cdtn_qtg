<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\CategoryService;
use App\Services\AuthorService;
use App\Services\OwnerService;

class ProductController extends Controller
{
    private $productService;
    private $authorService;
    private $categoryService;
    private $ownerService;

    /**
     * @param $postService
     */
    public function __construct(
        ProductService $productService,
        AuthorService $authorService,
        CategoryService $categoryService,
        OwnerService $ownerService
    ) {
        $this->productService = $productService;
        $this->authorService = $authorService;
        $this->categoryService = $categoryService;
        $this->ownerService = $ownerService;
        $authors = $this->authorService->getAll();
        $categories = $this->categoryService->getAll();
        $owners = $this->ownerService->getAll();
        view()->share(['authors' => $authors, 'categories' => $categories, 'owners' => $owners]);
    }

    public function index(Request $request)
    {
        $products = $this->productService->getPaginate();

        if($request->keyword && ($request->category_id || $request->author_id || $request->owner_id == config('consts.owner.none') || $request->owner_id)) {
            $products = $this->productService->searchAndFilter($request);
        }
        else if ($request->category_id || $request->author_id || $request->owner_id == config('consts.owner.none') || $request->owner_id) {
            $products = $this->productService->filter($request);
        }
        else if ($request->keyword) {
            $products = $this->productService->search($request);
        }

        if ($products->count() > 0) {
            return view('home.products.index', compact('products'));
        } else {
            return redirect()->back()->with('error', 'Không có tác phẩm nào phù hợp');
        }
    }

    public function show($id)
    {
        $product = $this->productService->getById($id);
        return view('home.products.show', compact('product'));
    }

    function getProductByService($service, $id)
    {
        $object = $service->getById($id);
        $products = $object->products()->paginate(10);
        return $products;
    }

    public function getProductByCategory($id)
    {
        $products = $this->getProductByService($this->categoryService, $id);
        return view('home.products.index', compact('products'));
    }

    public function getProductByAuthor($id)
    {
        $products = $this->getProductByService($this->authorService, $id);
        return view('home.products.index', compact('products'));
    }

    public function getProductByOwner($id)
    {
        $products = $this->getProductByService($this->ownerService, $id);
        return view('home.products.index', compact('products'));
    }

    public function getIdData($data)
    {
        $ids = [];
        foreach ($data as $item) {
            array_push($ids, $item->id);
        }
        return $ids;
    }
}
