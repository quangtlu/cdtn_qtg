<?php

namespace App\Http\Controllers\home;

use App\Services\PostService;
use Illuminate\Http\Request;

class PostController
{
    private $postService;

    /**
     * @param $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getPaginate();
        return view('home.posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = $this->postService->getById($id);
        return view('home.posts.show', compact('post'));
    }
}
