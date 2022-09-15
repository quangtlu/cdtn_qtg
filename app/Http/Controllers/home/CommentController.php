<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\Comment\CommentRequest;
use App\Services\CommentService;
use Illuminate\Support\Facades\Auth;
use App\Services\NotificationService;

class CommentController extends Controller
{
    private $commentService;
    private $notificationService;

    public function __construct(CommentService $commentService, NotificationService $notificationService)
    {
        $this->commentService = $commentService;
        $this->notificationService = $notificationService;
    }

    public function store(CommentRequest $request)
    {
        $comment = $this->commentService->create($request);
        $userPost = $comment->post->user;

        if ($comment->user_id != $userPost->id) {
            $this->notificationService->notiComment($comment, $userPost);
        }
        $others['GetPostByUser'] = route('posts.getPostByUser', ['id' => $comment->user_id]);
        $others['destroyComment'] =  route('comments.destroy', ['id' => $comment->id]);
        $others['updateComment'] =  route('comments.update', ['id' => $comment->id]);
        $others['userImage'] =  asset('image/profile') . '/' . $comment->user->image;
        $others['time'] =  $comment->created_at->diffForHumans();
        $others['_token'] =  csrf_token();

        return response()->json(['comment' => $comment, 'others' => $others]);
    }

    public function update(CommentRequest $request, $id)
    {
        $comment = $this->commentService->update($request, $id);
        return response()->json([
            'message' => config('consts.message.success.update'), 'comment' => $comment
        ]);
    }

    public function toogleStatus($id)
    {
        try {
            $this->commentService->toogleStatus($id);
            return Redirect()->back()->with(
                'success',
                config('consts.message.success.update')
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', config('consts.message.error.common'));
        }
    }

    public function destroy($id)
    {
        $comment = $this->commentService->getById($id);
        if (Auth::user()->id == $comment->user->id || Auth::user()->id == $comment->post->user_id) {
            $commentDeleted = $this->commentService->delete($id);
            if ($commentDeleted) {
                return response()->json(['message' => config('consts.message.success.delete'), 'comment' => $comment]);
            }
        } else {
            abort(403);
        }
    }
}
