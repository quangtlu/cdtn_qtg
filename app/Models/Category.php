<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["name", "parent_id", "type_id"];
    
    public function postCategory()
    {
        return $this->hasMany(PostCategory::class, 'category_id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_category');
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
