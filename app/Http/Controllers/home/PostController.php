<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\CategoryService;
use App\Services\ChatroomService;
use App\Services\NotificationService;
use App\Services\ReferenceService;
use App\Services\TagService;
use Spatie\Permission\Traits\HasRoles;

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
        NotificationService $notificationService,
        ReferenceService $referenceService
    ) {
        $this->postService = $postService;
        $this->tagService = $tagService;
        $this->categoryService = $categoryService;
        $this->chatroomService = $chatroomService;
        $this->notificationService = $notificationService;
        $tags = $this->tagService->getAll();
        $references = $referenceService->getAll();
        $categories = $this->categoryService->getParentBytype([config('consts.category.type.post.value')]);
        $categoryReferences = $this->categoryService->getParentBytype([config('consts.category.type.post.value'), config('consts.category.type.post_reference.value')]);
        view()->share([
            'tags' => $tags,
            'categories' => $categories,
            'categoryReferences' => $categoryReferences,
            'references' => $references,
        ]);
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
                if ($request->isAjax) {
                    $postAjaxs = $this->postService->search($request, $request->isAjax);
                    $html = "";
                    if ($postAjaxs->count()) {
                        foreach ($postAjaxs as $post) {
                            $urlShow = route('posts.show', ['id' => $post->id]);
                            $html .= "
                                <li class='search-result-item'>
                                    <a href='$urlShow' class='limit-line-1 search-result-item__link' >
                                        $post->title
                                    </a>
                                </li>
                            ";
                        }
                    }
                    return response()->json(['html' => $html]);
                } else {
                    $posts = $this->postService->search($request);
                }
            }
            if ($request->sort) {
                $posts = $this->postService->sortPost($request->sort);
            }
            return view('home.posts.index', compact('posts'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.getData'));
        }
    }

    public function getPotRequest()
    {
        try {
            $posts = $this->postService->getPostRequest();
            if (!$posts->count()) {
                return redirect()->back()->with('error', 'Không có bài viết nào yêu cầu phê duyệt');
            } else {
                return view('home.posts.post-request', compact('posts'));
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.getData'));
        }
    }

    public function getMyPost()
    {
        try {
            $posts = $this->postService->myPost();
            $isMyPost = true;
            return view('home.posts.my-post', compact('posts'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.getData'));
        }
    }

    public function show($id)
    {
        try {
            $postContainUnaccept = $this->postService->getById($id);
            $user = Auth::user();
            if (
                ($postContainUnaccept->status == config('consts.post.status.request.value') || $postContainUnaccept->status == config('consts.post.status.refuse.value'))
                && $user
                && ($user->id == $postContainUnaccept->user_id || $user->hasAnyRole('mod', 'admin'))
            ) {
                $post = $postContainUnaccept;
            } else {
                $post = $this->postService->getDetailPost($id);
            }

            if ($post) {
                $postRelates = $this->postService->getPostRelate($id);
                $counselors = $this->postService->getAllCounselor($id);
                return view('home.posts.show', compact('post', 'postRelates', 'counselors'));
            } else {
                abort('404');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.getData'));
        }
    }

    public function store(StorePostRequest $request)
    {
        try {
            $post = $this->postService->create($request);
            $message = 'Bài viết đang chờ phê duyệt';
            if (Auth::user()->hasAnyRole('mod', 'admin', 'editor')) {
                $message = 'Đăng bài thành công';
                return redirect()->route('posts.index')->with('success', $message);
            } else {
                $this->notificationService->notiRequestPost($post);
                $this->notificationService->sendNotiResult($post, '');
                return redirect()->back()->with('success', $message);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function update(StorePostRequest $request, $id)
    {
        try {
            $post = $this->postService->getById($id);
            if ($post->user_id == Auth::user()->id) {
                $postUpdated = $this->postService->update($request, $id);
                $postUpdated->tags;
                $postUpdated->categories;
                return redirect()->back()->with('success', config('consts.message.success.update'));
            } else {
                abort(403);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function handleRequest(Request $request, $id)
    {
        try {
            $action = $request->action;
            if ($request->noti_id) {
                $this->notificationService->destroy($request->noti_id);
            }
            if ($this->postService->getById($id)->status != config('consts.post.status.request.value')) {
                return response()->json(['message' => 'Bài viết đã được xét duyệt']);
            } else {
                $user = Auth::user();
                if ($user->hasAnyRole('mod', 'admin')) {
                    $post = $this->postService->handleRequestPost($id, $action);
                    $this->notificationService->sendNotiResult($post, $action);
                    $message = $action == config('consts.post.action.accept') ? 'Phê duyệt thành công' : 'Từ chối thành công';
                    return response()->json(['post' => $post, 'message' => $message]);
                } else {
                    abort(403);
                }
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function toogleStatus($id)
    {
        try {
            $post = $this->postService->getById($id);
            if ($post->user->id == Auth::user()->id) {
                $this->postService->toogleSovled($id);
                return Redirect()->back()->with('success', config('consts.message.success.update'));
            } else {
                abort(403);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function destroy($id)
    {
        try {
            $post = $this->postService->getById($id);
            if ($post->user->id == Auth::user()->id) {
                $post = $this->postService->delete($id);
                if ($post->chatroom) {
                    $this->chatroomService->delete($post->chatroom->id);
                }
                return response()->json(['post' => $post, 'message' => config('consts.message.success.delete')]);
            } else {
                abort(403);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function getPostByCategory($categoryId)
    {
        try {
            $posts = $this->postService->getByCategory($categoryId);
            $category = $this->categoryService->getById($categoryId);

            if ($category->type == config('consts.category.type.post_reference.value')) {
                $post = $posts->first();
                return view('home.posts.reference', compact('post'));
            } else {
                return view('home.posts.index', compact('posts'));
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function getPostByUser($userId)
    {
        try {
            $posts = $this->postService->getByUser($userId);
            return view('home.posts.index', compact('posts'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function getPostByTag($tagId)
    {
        try {
            $posts = $this->postService->getByTag($tagId);
            return view('home.posts.index', compact('posts'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function connectToCounselor(Request $request, $id)
    {
        try {
            $this->chatroomService->create($request, $id);
            $post = $this->postService->getById($id);
            $this->notificationService->notiConnectToUser($post, $request->counselor_id);
            $this->notificationService->notiConnectToCounselor($post, $request->counselor_id);
            return Redirect()->back()->with('success', config('consts.message.success.connect'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.connect'));
        }
    }
}
