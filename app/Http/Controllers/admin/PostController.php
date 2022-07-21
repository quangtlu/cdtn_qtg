<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\TagService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $postService;

    public function __construct(
        PostService $postService,
        TagService $tagService,
        CategoryService $categoryService
    ) {
        $this->postService = $postService;
        $this->tagService = $tagService;
        $this->categoryService = $categoryService;
        $tags = $this->tagService->getAll();
        $categories = $this->categoryService->getBytype([config('consts.category.type.post.value'), config('consts.category.type.post_reference.value')]);
        view()->share(['tags' => $tags, 'categories' => $categories]);
    }

    public function index(Request $request)
    {
        try {
            $posts = $this->postService->getAllPaginate();
            if ($request->keyword) {
                $posts = $this->postService->search($request);
            }
            if ($request->keyword && ($request->category_id || $request->tag_id || $request->status)) {
                $posts = $this->postService->searchAndFilter($request);
            }
            if ($request->category_id || $request->tag_id || $request->status) {
                $posts = $this->postService->filter($request);
            }
            return view('admin.posts.index', compact('posts'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.getData'));
        }
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
        if ($post->user_id != Auth::user()->id && !Auth::user()->hasRole('admin')) {
            abort(403);
        }
        $postUser = $post->user;
        $postOfTags = $post->tags;
        $postOfCategories = $post->categories;
        $postImgs = explode("|", $post->image)[0];
        return view('admin.posts.edit', compact('post', 'postUser', 'postImgs', 'postOfTags', 'postOfCategories'));
    }

    public function update(StorePostRequest $request, $id)
    {
        $this->postService->update($request, $id);
        return Redirect(route('admin.posts.index'))->with('success', 'Cập nhật bài viết thành công');
    }

    public function destroy($id)
    {
        $post = $this->postService->getById($id);
        if ($post->user_id != Auth::user()->id && !Auth::user()->hasRole('admin')) {
            abort(403);
        }
        $post = $this->postService->delete($id);
        return response()->json(['post' => $post, 'message' => 'Xóa bài viết thành công']);
    }
}
