<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function ConversationUser()
    {
        return $this->hasMany(ConversationUser::class);
    }

    public function Messages()
    { 
        return $this->hasMany(Messages::class);
    }

    public function User()
    {
        return $this->belongsToMany(User::class);
    }
}
