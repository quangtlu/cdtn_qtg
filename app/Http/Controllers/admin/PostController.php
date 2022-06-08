<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Http\Requests\Admin\Post\UpdatePostRequest;
use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\TagService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    private $postService;

    public function __construct(PostService $postService,
                                TagService $tagService, CategoryService $categoryService)
    {
        $this->postService = $postService;
        $this->tagService = $tagService;
        $this->categoryService = $categoryService;
        $tags = $this->tagService->getAll();
        $categories = $this->categoryService->getAll();
        view()->share(['tags' => $tags, 'categories' => $categories]);
    }

    public function index()
    {
        $posts = $this->postService->getPaginate();
        return view('admin.posts.index', compact('posts'));
    }

    public function search(Request $request)
    {
        $posts = $this->postService->search($request);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StorePostRequest $request)
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
        $postOfTags = $post->tag;
        $postOfCategories = $post->category;
        $postImgs = explode("|", $post->image)[0];
        return view('admin.posts.edit', compact('post', 'postUser', 'postImgs', 'postOfTags', 'postOfCategories'));
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $this->postService->update($request, $id);
        return Redirect(route('admin.posts.index'))->with('success', 'Cập nhật bài viết thành công');
    }

    public function destroy($id)
    {
        $this->postService->delete($id);
    }
}
