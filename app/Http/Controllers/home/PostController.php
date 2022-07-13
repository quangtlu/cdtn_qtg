<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Http\Requests\Admin\Post\UpdatePostRequest;
use App\Models\Category;
use App\Models\User;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\CategoryService;
use App\Services\ChatroomService;
use App\Services\NotificationService;
use App\Services\TagService;
use App\Services\UserService;

class PostController extends Controller
{

    private $postService;
    private $tagService;
    private $categoryService;
    private $userService;
    private $chatroomService;
    private $notificationService;

    /**
     * @param $postService
     */
    public function __construct(
        PostService $postService,
        TagService $tagService,
        CategoryService $categoryService,
        UserService $userService,
        ChatroomService $chatroomService,
        NotificationService $notificationService
    ) {
        $this->postService = $postService;
        $this->tagService = $tagService;
        $this->categoryService = $categoryService;
        $this->userService = $userService;
        $this->chatroomService = $chatroomService;
        $this->notificationService = $notificationService;
    }

    public function index(Request $request)
    {
        $posts = $this->postService->getPaginate();
        $tags = $this->tagService->getAll();
        $categories = $this->categoryService->getAll();

        if ($request->keyword && ($request->category_id || $request->tag_id || $request->status)) {
            $posts = $this->postService->searchAndFilter($request);
        }
        if ($request->category_id || $request->tag_id || $request->status) {
            $posts = $this->postService->filter($request);
        }
        if ($request->keyword) {
            $posts = $this->postService->search($request);
        }

        if ($request->sort) {
            $posts = $this->postService->sortPost($request->sort);
        }

        if ($posts->count() < 1) {
            return redirect()->route('posts.index')->with('error', 'Không có bài viết nào phù hợp');
        }
        return view('home.posts.index', compact('posts', 'tags', 'categories'));
    }

    public function show($id)
    {
        $post = $this->postService->getById($id);
        $postRelates = $this->postService->getPostRelate($id);
        $counselors = $this->postService->getAllCounselor($id);
        return view('home.posts.show', compact('post', 'postRelates', 'counselors'));
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

    public function connectToCounselor(Request $request, $id)
    {
        $chatroom = $this->chatroomService->create($request, $id);
        $post = $this->postService->getById($id);

        if ($chatroom) {
            $this->notificationService->notiConnectToUser($post, $request->counselor_id);
            $this->notificationService->notiConnectToCounselor($post, $request->counselor_id);
            return Redirect()->back()->with('success', 'Kết nối thành công');
        } else {
            return Redirect()->back()->with('error', 'Có lỗi xảy ra trong quá trình kết nối');
        }
    }
}
