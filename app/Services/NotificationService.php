<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\CommentNotification;
use App\Notifications\ConnectNotification;

class NotificationService

{

    public function notiComment($comment, $userPost)
    {
        $data = [
            'post_id' => $comment->post_id,
            'comment_id' => $comment->id,
            'user_image' => $comment->user->image,
            'title' => '<strong>' . $comment->user->name . '</strong>' . ' đã bình luận về bài viết bạn của bạn',
            'content' => $comment->comment,
        ];
        $userPost->notify(new CommentNotification($data));
    }

    public function notiConnectToUser($post, $counselorId)
    {
        $counselor = User::find($counselorId);
        $data = [
            'chatroom_id' => $post->chatroom->id,
            'post_id' => $post->id,
            'title' => '<strong style="color: red"> Hệ thống </strong>' . ' đã kết nối bạn với chuyên gia tư vấn - '. '<strong>'.$counselor->name.'</strong>' ,
            'content' => '<b>Bài viết:</b> ' . $post->title,
            'text_btn' => 'Chat với chuyên gia tư vấn'
        ];
        $post->user->notify(new ConnectNotification($data));
    }

    public function notiConnectToCounselor($post, $counselorId)
    {
        $counselor = User::find($counselorId);
        $data = [
            'chatroom_id' => $post->chatroom->id,
            'post_id' => $post->id,
            'title' => '<strong style="color: red"> Hệ thống </strong>' . ' đã kết nối bạn với '.'<b>'.$post->user->name.'</b>',
            'content' => '<b>Bài viết:</b> ' . $post->title,
            'text_btn' => 'Tư vấn'
        ];
        $counselor->notify(new ConnectNotification($data));
    }
}
