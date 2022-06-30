<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'comment', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    protected $casts = [
        'created_at' => 'datetime:H:i:s d/m/Y ',
    ];
}
