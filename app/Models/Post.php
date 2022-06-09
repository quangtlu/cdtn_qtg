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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function postTag()
    {
        return $this->hasMany(PostTag::class, 'post_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }

    public function postCategory()
    {
        return $this->hasMany(PostCategory::class);
    }

    public function scopeSearch($query, $keywork)
    {
        return $query->where('title', 'LIKE', "%{$keywork}%")
            ->orWhere('content', 'LIKE', "%{$keywork}%")
            ->orWhereHas('user', function ($subQuery) use ($keywork) {
                $subQuery->where('name', 'like', '%' . $keywork . '%');
            });
    }
}
