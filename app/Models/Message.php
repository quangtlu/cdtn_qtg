<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Chatroom;

class Message extends Model
{
    protected $fillable = ['room', 'sender', 'content'];

    public function sender () {
        return $this->belongsTo(User::class, 'sender');
    }

    public function room () {
        return $this->belongsTo(Chatroom::class, 'room');
    }

    protected $casts = [
        'created_at' => 'datetime:H:i:s d/m/Y ',
    ];

}
