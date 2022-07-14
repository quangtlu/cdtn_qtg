<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Services\PostService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $postService;

    public function __construct(PostService $postService, ProductService $productService)
    {
        $this->postService = $postService;
        $this->productService = $productService;
    }

    public function index (Request $request)
    {
        $posts = $this->postService->getReferencePosts();

        if ($request->keyword) {
            $posts = $this->postService->search($request);
        }

        return view('home.index', compact('posts'));
    }
}
