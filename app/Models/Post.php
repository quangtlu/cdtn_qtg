<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["title", "content", 'user_id', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function postTag()
    {
        return $this->hasMany(PostTag::class, 'post_id');
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
}
