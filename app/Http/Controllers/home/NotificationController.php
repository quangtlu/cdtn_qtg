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

    public function markAsRead($id) {
        $notification = $this->getNotificationById($id);
        $notification->markAsRead();
        return redirect()->back();
    }
}
