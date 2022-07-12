<?php

namespace App\Http\Controllers\Home;

use App\Models\Chatroom;
use Illuminate\Support\Facades\Auth;

class MessengerController
{
    public function index () {
        $user = Auth::user();
        $data = ['user' => $user, 'rooms' => $user->chatrooms];
        return view('messenger', ['data' => $data]);
    }
}