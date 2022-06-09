<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["name", "parent_id", "type"];
    
    public function postCategory()
    {
        return $this->hasMany(PostCategory::class, 'category_id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_category');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category');
    }

}
