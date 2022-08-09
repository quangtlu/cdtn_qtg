<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\UserService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $postService;
    private $userService;
    private $categoryService;

    public function __construct(
        PostService $postService,
        CategoryService $categoryService,
        UserService $userService
    ) {
        $this->postService = $postService;
        $this->categoryService = $categoryService;
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $categories = $this->categoryService->getByPopular(5);
        $posts = $this->postService->getByPopular(5);
        $counselors = $this->userService->getTopCounselor(4);
        return view('home.index', compact('categories', 'posts', 'counselors'));
    }
}
