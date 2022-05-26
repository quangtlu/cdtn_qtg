<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConversationUser extends Model
{
    protected $fillable = ["conversation_id", "user_id"];

    public function Conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
