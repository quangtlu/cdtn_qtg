<?php

namespace App\Services;

use App\Models\Comment;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class CommentService

{
    private $commentModel;

    public function __construct(Comment $commentModel)
    {
        $this->commentModel = $commentModel;
    }

    public function getById($id)
    {
        $conversation = $this->commentModel->findOrFail($id);
        return $conversation;
    }

    public function create($request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'post_id' => $request->post_id,
            'comment' => $request->comment,
            'status' => config('consts.post.status.unsolved.value')
        ];
        return $this->commentModel->create($data);
    }

    public function update($request, $id)
    {
        $comment = $this->getById($id);
        $data = [
            'user_id' => Auth::user()->id,
            'post_id' => $request->post_id,
            'comment' => $request->comment,
            'updated_at' => Carbon::now()
        ];
        $comment->update($data);
        return $comment;
    }

    public function toogleStatus($id)
    {
        $comment = $this->getById($id);
        $post = $comment->post;
        $data = ['status' => $comment->status == config('consts.post.status.unsolved.value') ? config('consts.post.status.solved.value') : config('consts.post.status.unsolved.value')];
        try {
            $comment->update($data);
            $post->update($data);
            return true;
        }
        catch(Exception $ex) {
            return false;
        }

    }

    public function delete($id)
    {
        return $this->commentModel->destroy($id);
    }
}
