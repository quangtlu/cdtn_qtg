<?php

namespace App\Http\Controllers\Home;

use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FeedbackController
{
    public function latest($chatroom_id)
    {   
        $feedback =  Feedback::where('user_id', Auth::user()->id)->where('chatroom_id', $chatroom_id)->latest()->first();
        return response()->json(['feedback' => $feedback]);
    }

    public function update(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'chatroom_id' => $request->chatroom_id,
            'note' => $request->note,
            'score' => $request->score,
        ];

        $feedback = Feedback::where('user_id', Auth::user()->id)
                             ->where('chatroom_id', $request->chatroom_id)
                             ->updateOrCreate($data);
        
        return response()->json(['feedback' => $feedback]);
    }

}