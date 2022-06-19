<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Http\Requests\Admin\Post\UpdatePostRequest;
use App\Models\Category;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\CategoryService;
use App\Services\TagService;
use App\Services\UserService;

class PostController extends Controller
{
    
    private $postService;
    private $tagService;
    private $categoryService;
    private $userService;


    /**
     * @param $postService
     */
    public function __construct(
        PostService $postService,
        TagService $tagService,
        CategoryService $categoryService,
        UserService $userService
    ) {
        $this->postService = $postService;
        $this->tagService = $tagService;
        $this->categoryService = $categoryService;
        $this->userService = $userService;
        $tags = $this->tagService->getAll();
        $categories = $this->categoryService->getAll();
        view()->share(['tags' => $tags, 'categories' => $categories]);
    }

    public function index(Request $request)
    {
        $posts = $this->postService->getPaginate();
        if($request->keyword) {
            $posts = $this->postService->search($request);
        }
        if ($posts->count() > 0) {
            return view('home.posts.index', compact('posts'));
        } else {
            return redirect()->back()->with('error', 'Không có bài viết nào phù hợp');
        }
    }

    public function show($id)
    {
        $post = $this->postService->getById($id);
        $comments = $post->comments()->paginate(10);
        return view('home.posts.show', compact('post', 'comments'));
    }

    public function store(StorePostRequest $request)
    {
        $this->postService->create($request);
        return Redirect()->back()->with('success', 'Đăng bài thành công');
    }
    

    public function update(UpdatePostRequest $request, $id)
    {
        $post = $this->postService->getById($id);
        if ($post->user->id == Auth::user()->id) {
            $this->postService->update($request, $id);
            return Redirect()->back()->with('success', 'Cập nhật thành công');
        } else {
            return Redirect()->back()->with('error', 'Bạn không có quyền truy cập');
        }
    }

    public function toogleStatus($id)
    {
        $post = $this->postService->getById($id);
        if ($post->user->id == Auth::user()->id) {
            $this->postService->toogleStatus($id);
            return Redirect()->back()->with('success', 'Cập nhật thành công');
        } else {
            return Redirect()->back()->with('error', 'Bạn không có quyền truy cập');
        }
    }

    public function destroy($id)
    {
        $post = $this->postService->getById($id);
        if ($post->user->id == Auth::user()->id) {
            $this->postService->delete($id);
        } else {
            return Redirect()->back()->with('error', 'Bạn không có quyền truy cập');
        }
    }

    function getPostByService($service, $id)
    {
        $object = $service->getById($id);
        $posts = $object->posts()->paginate(10);
        return $posts;
    }

    public function getPostByCategory($id)
    {
        $posts = $this->getPostByService($this->categoryService, $id);
        return view('home.posts.index', compact('posts'));
    }

    public function getPostByUser($id)
    {
        $posts = $this->getPostByService($this->userService, $id);
        return view('home.posts.index', compact('posts'));
    }

    public function getPostByTag($id)
    {
        $posts = $this->getPostByService($this->tagService, $id);
        return view('home.posts.index', compact('posts'));
    }
}
