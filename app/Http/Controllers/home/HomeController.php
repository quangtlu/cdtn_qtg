<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Services\PostService;
use App\Services\ProductService;

class HomeController extends Controller
{
    private $postService;
    private $productService;

    public function __construct(PostService $postService, ProductService $productService)
    {
        $this->postService = $postService;
        $this->productService = $productService;
    }


    public function index ()
    {
        $posts = $this->postService->getPostHome();
        $products = $this->productService->getProductHome();
        return view('home.index', compact('posts', 'products'));
    }
}
