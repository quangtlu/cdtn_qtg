<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function ConversationUser()
    {
        return $this->hasMany(ConversationUser::class);
    }
}
