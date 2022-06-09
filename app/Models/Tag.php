<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ["name"];

    public function postTag()
    {
        return $this->hasMany(PostTag::class, 'tag_id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where('name', 'LIKE', "%{$keyword}%");
    }
}
