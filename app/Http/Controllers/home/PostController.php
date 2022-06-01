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

    public function store(Request $request)
    {
        $this->postService->create($request);
        return Redirect(route('posts.index'))->with('success', 'Đăng bài thành công');
    }
}
