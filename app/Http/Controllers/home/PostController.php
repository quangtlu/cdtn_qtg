<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Http\Requests\Admin\Post\UpdatePostRequest;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\CategoryService;
use App\Services\ChatroomService;
use App\Services\NotificationService;
use App\Services\TagService;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\User;

class PostController extends Controller
{
    use HasRoles;

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
        ChatroomService $chatroomService,
        NotificationService $notificationService
    ) {
        $this->postService = $postService;
        $this->tagService = $tagService;
        $this->categoryService = $categoryService;
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

    public function getMyPost()
    {
        $posts = $this->postService->myPost();
        $isMyPost = true; 
        return view('home.posts.index', compact('posts', 'isMyPost'));
    }

    public function show($id)
    {
        $postContainUnaccept = $this->postService->getById($id);
        $post = $this->postService->getDetailPost($id);
        $user = Auth::user();
        if (isset($user) && ($user->id == $postContainUnaccept->user_id || $user->hasAnyRole('mod', 'super-admin'))) {
            $post = $postContainUnaccept;
        }
        if ($post->count() < 1) {
            abort(404);
        }
        $postRelates = $this->postService->getPostRelate($id);
        $counselors = $this->postService->getAllCounselor($id);
        return view('home.posts.show', compact('post', 'postRelates', 'counselors'));

    }

    public function store(StorePostRequest $request)
    {
        $post = $this->postService->create($request);
        $this->notificationService->notiRequestPost($post);
        return Redirect()->back()->with('success', 'Bài viết đang chờ phê duyệt');
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

    public function handleRequest(Request $request, $id)
    {
        $action = $request->action;
        $this->notificationService->destroy($request->noti_id);
        if($this->postService->getById($id)->status != config('consts.post.status.request.value')) {
            return redirect()->back()->with('error', 'Bài viết đã được xét duyệt');
        }
        else {
            $post = $this->postService->handleRequestPost($id, $action);
            $this->notificationService->sendNotiResult($post, $action);
            $message = $action == config('consts.post.action.accept') ? 'Phê duyệt thành công' : 'Từ chối thành công';
            $user = Auth::user();
            if($user->hasAnyRole('mod', 'super-admin')) {
                return redirect()->back()->with('success', $message);
            } else {
                return redirect()->back()->with('error', 'Bạn không có quyền phê duyệt');
            }
        }

    }

    public function toogleStatus($id)
    {
        $post = $this->postService->getById($id);
        if ($post->user->id == Auth::user()->id) {
            $this->postService->toogleSovled($id);
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

    public function getPostByCategory($categoryId)
    {
        $posts = $this->postService->getByCategory($categoryId);
        return view('home.posts.index', compact('posts'));
    }

    public function getPostByUser($userId)
    {
        $posts = $this->postService->getByUser($userId);
        return view('home.posts.index', compact('posts'));
    }

    public function getPostByTag($tagId)
    {
        $posts = $this->postService->getByTag($tagId);
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
