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

    public function category()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
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

    public function scopeType($query, $type)
    {
        return $query->whereIn('type', $type);
    }

}
