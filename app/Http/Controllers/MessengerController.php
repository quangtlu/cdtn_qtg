<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chatroom;
use Illuminate\Support\Facades\Auth;

class MessengerController extends Controller
{
    public function index () {
        $user = Auth::user();
        $data = ['user' => $user, 'rooms' => $user->chatrooms];
        return view('messenger', ['data' => $data]);
    }
}