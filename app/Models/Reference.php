<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table = 'references';
    protected $fillable = ['title', 'description', 'url'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_reference','reference_id', 'post_id');
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where('title', 'LIKE', "%{$keyword}%")
            ->orWhere('description', 'LIKE', "%{$keyword}%")
            ->orWhere('url', 'LIKE', "%{$keyword}%");
    }
}
