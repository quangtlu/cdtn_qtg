<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\TagService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ReferenceService;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $postService;

    public function __construct(
        PostService $postService,
        TagService $tagService,
        ReferenceService $referenceService,
        CategoryService $categoryService
    ) {
        $this->postService = $postService;

        $tags = $tagService->getAll();
        $references = $referenceService->getAll();
        $categories = $categoryService->getParentBytype([config('consts.category.type.post.value'), config('consts.category.type.post_reference.value')]);
        view()->share(['tags' => $tags, 'categories' => $categories, 'references' => $references]);
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
        try {
            $this->postService->create($request);
            return Redirect(route('admin.posts.index'))->with(
                'success',
                config('consts.message.success.create')
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function show($id)
    {
        try {
            $post = $this->postService->getById($id);
            $postImgs = $post->image ?  explode("|", $post->image) : null;
            return view('admin.posts.show', compact('post', 'postImgs'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function edit($id)
    {
        try {
            $post = $this->postService->getById($id);
            if ($post->user_id != Auth::user()->id && !Auth::user()->hasRole('admin')) {
                abort(403);
            }
            $postUser = $post->user;
            $postOfTags = $post->tags;
            $postOfCategories = $post->categories;
            $postImgs = explode("|", $post->image)[0];
            return view('admin.posts.edit', compact('post', 'postUser', 'postImgs', 'postOfTags', 'postOfCategories'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function update(StorePostRequest $request, $id)
    {
        try {
            $this->postService->update($request, $id);
            return Redirect(route('admin.posts.index'))->with(
                'success',
                config('consts.message.success.update')
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function destroy($id)
    {
        try {
            //code...
            $post = $this->postService->getById($id);
            if ($post->user_id != Auth::user()->id && !Auth::user()->hasRole('admin')) {
                abort(403);
            }
            $post = $this->postService->delete($id);
            return response()->json([
                'post' => $post, 'message' => config('consts.message.success.delete')
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }
}
