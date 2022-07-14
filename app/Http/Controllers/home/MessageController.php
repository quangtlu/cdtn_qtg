<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\MessagePosted;
use App\Models\Chatroom;

class MessageController
{
    public function index ($chatroom_id) {
        $messages = Message::with(['sender'])->where('room', $chatroom_id)->orderBy('created_at', 'asc')->get();
        $chatroom = Chatroom::findOrFail($chatroom_id);
        return $chatroom->users->contains('id', Auth::user()->id) ? $messages : response()->json(['message' => 'Không có quyền truy cập'], 403);
    }

    public function store (Request $request) {
        $message = new Message();
        $message->room = $request->input('room', '');
        $message->sender = Auth::user()->id;
        $message->content = $request->input('content', '');

        $message->save();

        broadcast(new MessagePosted($message->load('sender')))->toOthers();

        return response()->json(['message' => $message->load('sender')]);
    }
}