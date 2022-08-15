<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["title", "content", 'user_id', 'image', 'status'];
    protected $appends = ["status_name", "status_icon_class", 'status_class'];

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

    public function chatroom()
    {
        return $this->hasOne(Chatroom::class);
    }

    public function scopeAccepted($query)
    {
        return $query->whereNotIn('posts.status', [config('consts.post.status.refuse.value'), config('consts.post.status.request.value')]);
    }

    public function scopeHasCategory($query, $categoryId)
    {
        return $query->whereHas('categories', function ($subQuery) use ($categoryId) {
            $subQuery->where('categories.id', $categoryId);
        });
    }

    public function scopeHasTag($query, $tagId)
    {
        return $query->whereHas('tags', function ($subQuery) use ($tagId) {
            $subQuery->where('tags.id', $tagId);
        });
    }

    public function scopeReference($query)
    {
        return $query->whereHas('categories', function ($subQuery) {
            $subQuery->where('categories.type', config('consts.category.type.post_reference.value'));
        });
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where('title', 'LIKE', "%{$keyword}%")
            ->orWhere('content', 'LIKE', "%{$keyword}%")
            ->orWhereHas('user', function ($subQuery) use ($keyword) {
                $subQuery->where('name', 'like', '%' . $keyword . '%');
            });
    }

    public function scopeFilterCategory($query, $request)
    {
        if ($request->category_id) {
            $query->whereHas('categories', function ($subQuery) use ($request) {
                $subQuery->where('category_id', $request->category_id);
            });
        }
        return $query;
    }

    public function scopeFilterTag($query, $request)
    {
        if ($request->tag_id) {
            $query->whereHas('tags', function ($subQuery) use ($request) {
                $subQuery->where('tag_id', $request->tag_id);
            });
        }
        return $query;
    }

    public function scopeFilterStatus($query, $request)
    {
        if ($request->status) {
            $query->where('status', $request->status);
        }
        return $query;
    }

    public function getKeyInStatus($key)
    {
        foreach (config('consts.post.status') as $status) {
            if($this->status == $status['value']) {
                return $status[$key];
            }
        }
    }

    public function getStatusNameAttribute() {
        return $this->getKeyInStatus('name');
    }

    public function getStatusIconClassAttribute() {
        return $this->getKeyInStatus('classIcon');
    }

    public function getStatusClassAttribute() {
        return $this->getKeyInStatus('className');
    }
}
