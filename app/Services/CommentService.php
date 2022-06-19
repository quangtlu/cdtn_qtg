<?php

namespace App\Services;

use App\Models\Comment;
use Carbon\Carbon;
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
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
            'comment' => $request->comment,
        ];
        return $this->commentModel->create($data);
    }

    public function update($request, $id)
    {
        $comment = $this->getById($id);
        $data = [
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
            'comment' => $request->comment,
            'updated_at' => Carbon::now()
        ];
        $comment->update($data);
    }

    public function delete($id)
    {
        $this->commentModel->destroy($id);
    }
}
