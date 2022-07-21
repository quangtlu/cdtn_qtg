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

        if($comment->user_id != $userPost->id){
            $this->notificationService->notiComment($comment, $userPost);
        }
        $ortherData['GetPostByUser'] = route('posts.getPostByUser', ['id' => $comment->user_id]);
        $ortherData['destroyComment'] =  route('comments.destroy', ['id' => $comment->id]);
        $ortherData['updateComment'] =  route('comments.update', ['id' => $comment->id]);
        $ortherData['userImage'] =  asset('image/profile') .'/'. $comment->user->image;
        $ortherData['time'] =  $comment->created_at->diffForHumans();

        return response()->json(['comment' => $comment, 'ortherData' => $ortherData]);
    }

    public function update(CommentRequest $request, $id)
    {
        $comment = $this->commentService->update($request, $id);
        return response()->json(['message' => 'Cập nhật thành công', 'comment' => $comment]);
    }

    public function toogleStatus($id)
    {
        if ($this->commentService->toogleStatus($id)) {
            return Redirect()->back()->with('success', 'Cập nhật thành công');
        } else {
            return Redirect()->back()->with('error', 'Cập nhật thất bại');
        }
    }

    public function destroy($id)
    {
        $comment = $this->commentService->getById($id);
        if (Auth::user()->id != $comment->user->id ) {
            abort(403);
        }
        else {
            return response()->json(['message' => 'Xóa bình luận thành công']);
        }
    }

}
