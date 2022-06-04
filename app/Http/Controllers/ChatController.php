<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessagePosted;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }

    public function getUserLogin()
    {
        return Auth::user();
    }

    public function getMessage()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        // $user = Auth::user();

        // $message = Message::create([
        //     'user_id' => $user->id,
        //     'message' => $request->message,
        // ]);
        // broadcast(new MessagePosted($message, $user))->toOthers();
        // return ['message' => $message->load('user')];

        $user = Auth::user();

        $message = new Message();
        $message->message = request()->get('message', '');
        $message->user_id = $user->id;
        $message->save();

        broadcast(new MessagePosted($message, $user))->toOthers();
        return ['message' => $message->load('user')];
    }
}

