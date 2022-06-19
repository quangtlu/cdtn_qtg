<?php

namespace App\Services;

use App\Notifications\TestNotification;

class NotificationService

{

    public function create($comment, $user)
    {
        $data = [
            'post_id' => $comment->post_id,
            'comment_id' => $comment->id,
            'user_image' => $comment->user->image,
            'title' => '<strong>' . $comment->user->name . '</strong>' . ' đã bình luận về bài viết bạn của bạn',
            'content' => $comment->comment,
        ];
        $user->notify(new TestNotification($data));
    }
}
