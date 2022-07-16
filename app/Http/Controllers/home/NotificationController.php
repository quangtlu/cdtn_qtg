<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function showPost($id) {
        $notification = $this->notificationService->getById($id);
        $notification->markAsRead();
        return redirect(route('posts.show', ['id' => $notification->data['post_id']]));
    }

    public function markAsReadAll() {
        $notifications = Auth::user()->notifications;
        foreach($notifications as $notification) {
            if($notification->unread()) {
                $notification->markAsRead();
            }
        }
        return redirect()->back()->with('success', 'Thành công');
    }

    public function deleteAll() {
        $notifications = Auth::user()->notifications;
        foreach($notifications as $notification) {
            $this->notificationService->destroy($notification->id);
        }
        return redirect()->back()->with('success', 'Xóa tất cả thông báo thành công');
    }
}
