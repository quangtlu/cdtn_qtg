<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatroomUser extends Model
{
    protected $table = 'chatroom_user';
    protected $fillable = ['chatroom_id', 'user_id'];
}
