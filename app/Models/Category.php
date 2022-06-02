<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["name", "parent_id"];
    
    public function postCategory()
    {
        return $this->hasMany(PostCategory::class, 'category_id');
    }

    public function post()
    {
        return $this->belongsToMany(Post::class, 'post_category');
    }
}
