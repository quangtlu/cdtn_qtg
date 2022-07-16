<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\TagService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $postService;
    private $tagService;
    private $categoryService;

    /**
     * @param $postService
     */
    public function __construct(
        PostService $postService,
        TagService $tagService,
        CategoryService $categoryService
    ) {
        $this->postService = $postService;
        $this->tagService = $tagService;
        $this->categoryService = $categoryService;

        $tags = $this->tagService->getAll();
        $categories = $this->categoryService->getBytype('post');
        view()->share(['tags' => $tags, 'categories' => $categories]);
    }

    public function index(Request $request)
    {
        $posts = $this->postService->getReferencePosts();

        if ($request->keyword) {
            $posts = $this->postService->search($request);
        }

        return view('home.index', compact('posts'));
    }
}
