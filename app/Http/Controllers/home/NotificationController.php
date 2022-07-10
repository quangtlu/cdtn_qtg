<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getNotificationById($id)
    {
        return Auth::user()->notifications()->find($id);
    }

    public function showPost($id) {
        $notification = $this->getNotificationById($id);
        $notification->markAsRead();
        return redirect(route('posts.show', ['id' => $notification->data['post_id']]));
    }

    public function markAsRead($id) {
        $notification = $this->getNotificationById($id);
        $notification->markAsRead();
        return redirect()->back();
    }
}
