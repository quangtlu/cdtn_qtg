<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\CommentNotification;
use App\Notifications\ConnectNotification;
use App\Notifications\PostRequestNotification;
use App\Notifications\PostResultNotification;
use Illuminate\Support\Facades\Auth;

class NotificationService
{

    public function getById($id)
    {
        return Auth::user()->notifications()->find($id);
    }

    public function notiComment($comment, $userPost)
    {
        $data = [
            'title' => '<strong>' . $comment->user->name . '</strong>' . ' đã bình luận về bài viết bạn của bạn',
            'content' => $comment->comment,
            'comment_id' => $comment->id,
            'user_image' => $comment->user->image,
            'post_id' => $comment->post_id,
        ];
        $userPost->notify(new CommentNotification($data));
    }

    public function notiRequestPost($post)
    {
        $data = [
            'title' => '<strong>' . $post->user->name . '</strong>'. ' đã yêu cầu phê duyệt bài viết',
            'post_id' => $post->id,
            'content' => '<b>Bài viết:</b> ' . $post->title,
        ];
        $users = User::role(['mod', 'admin'])->get();
        foreach($users as $user) {
            $user->notify(new PostRequestNotification($data));
        }
    }

    public function sendNotiResult($post, $action)
    {
        $data = [
            'post_id' => $post->id,
            'content' => '<b>Bài viết:</b> ' . $post->title,
        ];
        switch ($action) {
            case config('consts.post.action.accept'):
                $data['title'] = '<strong class="text-success">Bài viết của bạn đã được phê duyệt</strong>';
                break;
            case config('consts.post.action.refuse'):
                $data['title'] = '<strong class="text-danger">Bài viết của bạn đã bị từ chối</strong>';
                break;
            default:
                $data['title'] = '<strong class="text-primary">Bài viết của bạn đang được xét duyệt</strong>';
                break;
        }
        $post->user->notify(new PostResultNotification($data));
    }
    
    public function notiConnectToUser($post, $counselorId)
    {
        $counselor = User::find($counselorId);
        $data = [
            'post_id' => $post->id,
            'chatroom_id' => $post->chatroom->id,
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
            'post_id' => $post->id,
            'chatroom_id' => $post->chatroom->id,
            'title' => '<strong style="color: red"> Hệ thống </strong>' . ' đã kết nối bạn với '.'<b>'.$post->user->name.'</b>',
            'content' => '<b>Bài viết:</b> ' . $post->title,
            'text_btn' => 'Tư vấn'
        ];
        $counselor->notify(new ConnectNotification($data));
    }

    public function destroy($id)
    {
        $noti = $this->getById($id);
        $noti->delete();
    }
}
