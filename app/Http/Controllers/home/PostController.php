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
        $tags = $this->tagService->getAll();
        $categories = $this->categoryService->getBytype([config('consts.category.type.post.value'), config('consts.category.type.post_reference.value')]);
        view()->share(['tags' => $tags, 'categories' => $categories]);
    }

    public function index(Request $request)
    {
        try {
            $posts = $this->postService->getPaginate();
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
            if(!$posts->count()) {
                return redirect()->back()->with('error', 'Không có bài viết nào phù hợp');
            }
            return view('home.posts.index', compact('posts'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.getData'));
        }
        
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
        $user = Auth::user();
        if (
            ($postContainUnaccept->status == config('consts.post.status.request.value') || $postContainUnaccept->status == config('consts.post.status.refuse.value')) 
            && $user 
            && ($user->id == $postContainUnaccept->user_id || $user->hasAnyRole('mod', 'admin'))) {
            $post = $postContainUnaccept;
        } else{
            $post = $this->postService->getDetailPost($id);
        }

        if($post) {
            $postRelates = $this->postService->getPostRelate($id);
            $counselors = $this->postService->getAllCounselor($id);
            return view('home.posts.show', compact('post', 'postRelates', 'counselors'));
        } else {
            abort('404');
        }

    }

    public function store(StorePostRequest $request)
    {
        $post = $this->postService->create($request);
        
        $message = 'Bài viết đang chờ phê duyệt';
        if(Auth::user()->hasAnyRole('mod', 'admin', 'editor')) {
            $orther['getPostByUser'] = route('posts.getPostByUser', ['id' => $post->user_id]);
            $orther['showPost'] =  route('posts.show', ['id' => $post->id]);
            $orther['destroyPost'] =  route('posts.destroy', ['id' => $post->id]);
            $orther['time'] =  $post->created_at->diffForHumans();
            $orther['userName'] =  $post->user->name;
            foreach (config('consts.post.status') as $status) {
                if($post->status == $status['value'] && !$post->categories->contains('type', config('consts.category.type.post_reference.value'))) {
                    $orther['status']['name'] =  $status['name'];
                    $orther['status']['className'] =  $status['className'];
                    $orther['status']['classIcon'] =  $status['classIcon'];
                }
            }
            $message = 'Đăng bài thành công';
            return response()->json(['post' => $post,'orther' =>  $orther, 'message' => $message]);        

        }
        else {
            $this->notificationService->notiRequestPost($post);
            $this->notificationService->sendNotiResult($post, '');
            return response()->json(['message' => $message]);        
        }
    }


    public function update(StorePostRequest $request, $id)
    {
        $post = $this->postService->getById($id);
        if ($post->user_id == Auth::user()->id) {
            $postUpdated = $this->postService->update($request, $id);
            $postUpdated->tags;
            $postUpdated->categories;
            return response()->json(['post' => $postUpdated, 'message' => 'Cập nhật thành công']);
        } else {
            abort(403);
        }
    }

    public function handleRequest(Request $request, $id)
    {
        $action = $request->action;
        $this->notificationService->destroy($request->noti_id);
        if($this->postService->getById($id)->status != config('consts.post.status.request.value')) {
            return response()->json(['message' => 'Bài viết đã được xét duyệt']);
        }
        else {
            $post = $this->postService->handleRequestPost($id, $action);
            $this->notificationService->sendNotiResult($post, $action);
            $message = $action == config('consts.post.action.accept') ? 'Phê duyệt thành công' : 'Từ chối thành công';
            $user = Auth::user();
            if($user->hasAnyRole('mod', 'admin')) {
                return response()->json(['post' => $post, 'message' => $message]);
            } else {
                abort(403);
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
            abort(403);
        }
    }

    public function destroy($id)
    {
        $post = $this->postService->getById($id);
        if ($post->user->id == Auth::user()->id) {
            $post = $this->postService->delete($id);
            return response()->json(['post' => $post, 'message' => 'Xóa bài viết thành công']);
        } else {
            abort(403);
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
        try {
            $this->chatroomService->create($request, $id);
            $post = $this->postService->getById($id);
            $this->notificationService->notiConnectToUser($post, $request->counselor_id);
            $this->notificationService->notiConnectToCounselor($post, $request->counselor_id);
            return Redirect()->back()->with('success', 'Kết nối thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.connect'));
        }
    }
}
