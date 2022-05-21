<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = ["sender", "conversation_id", "content"];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}
