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
            $this->notificationService->create($comment, $userPost);
        }
                
        return redirect()->back();
    }

    public function update(CommentRequest $request, $id)
    {
        $this->commentService->update($request, $id);
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $comment = $this->commentService->getById($id);
        if (Auth::user()->id != $comment->user->id ) {
            return redirect()->back()->with('error', 'Bạn không có quyền truy cập');
        }
        else {
            $this->commentService->delete($id);
        }
    }

}
