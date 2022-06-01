<?php

namespace App\Http\Controllers\Admin;

use App\Services\PostService;
use App\Services\UserService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postService;

    public function __construct(PostService $postService, UserService $userService)
    {
        $this->postService = $postService;
        $this->userService = $userService;
    }

    public function index()
    {
        $posts = $this->postService->getPaginate();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $this->postService->create($request);
        return Redirect(route('admin.posts.index'))->with('success', 'Thêm mới bài viết thành công');
    }

    public function show($id)
    {
        $post = $this->postService->getById($id);
        $postImgs = $post->image ?  explode("|", $post->image) : null;
        return view('admin.posts.show', compact('post', 'postImgs'));
    }

    public function edit($id)
    {
        $post = $this->postService->getById($id);
        $postUser = $post->user;
        $postImgs = explode("|", $post->image)[0];
        return view('admin.posts.edit', compact('post', 'postUser', 'postImgs'));
    }

    public function update(Request $request, $id)
    {
        $this->postService->update($request, $id);
        return Redirect(route('admin.posts.index'))->with('success', 'Cập nhật bài viết thành công');
    }

    public function destroy($id)
    {
        $this->postService->delete($id);
        return Redirect(route('admin.posts.index'));
    }
}
