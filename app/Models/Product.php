<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["name", "pub_date", "regis_date", "owner_id", "description", "image"];

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function author()
    {
        return $this->belongsToMany(Author::class, 'author_product');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function scopeSearch($query, $keywork)
    {
        return $query->where('name', 'LIKE', "%{$keywork}%")
            ->orWhere('description', 'LIKE', "%{$keywork}%")
            ->orWhere('id', 'LIKE', "%{$keywork}%")
            ->orWhereHas('owner', function ($subQuery) use ($keywork) {
                $subQuery->where('name', 'like', '%' . $keywork . '%');
            })
            ->orWhereHas('author', function ($subQuery) use ($keywork) {
                $subQuery->where('name', 'like', '%' . $keywork . '%');
            });
    }
}
