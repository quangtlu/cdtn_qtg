<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["name", "parent_id", "type"];
    
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_category');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'counselors');
    }

    public function scopeSearch($query, $keywork)
    {
        return $query->where('name', 'LIKE', "%{$keywork}%")
            ->orWhere('id', 'LIKE', "%{$keywork}%")
            ->orWhere('type', 'LIKE', "%{$keywork}%");
    }

}
