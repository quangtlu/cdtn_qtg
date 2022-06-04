<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Http\Requests\Admin\Post\UpdatePostRequest;
use App\Services\PostService;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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

    public function store(StorePostRequest $request)
    {
        $this->postService->create($request);
        return Redirect(route('posts.index'))->with('success', 'Đăng bài thành công');
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $post = $this->postService->getById($id);
        if($post->user->id == Auth::user()->id){
            $this->postService->update($request, $id);
            return Redirect(route('posts.index'))->with('success', 'Cập nhật thành công');
        } else {
            return Redirect(route('posts.index'))->with('error', 'Bạn không có quyền truy cập');
        }

    }

    public function destroy($id)
    {
        $post = $this->postService->getById($id);
        if($post->user->id == Auth::user()->id){
            $this->postService->delete($id);
        } else {
            return Redirect(route('posts.index'))->with('error', 'Bạn không có quyền truy cập');
        }
    }

}
