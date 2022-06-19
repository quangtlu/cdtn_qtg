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

    public function scopeFilterOwner($query, $request)
    {
        if ($request->owner_id) {
            if ($request->owner_id == config('consts.owner.none')) {
                $query->where('owner_id', null);
            } else {
                $query->where('owner_id', $request->owner_id);
            }
        }
        return $query;
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

    public function scopeFilterAuthor($query, $request)
    {
        if ($request->author_id) {
            $query->whereHas('author', function ($subQuery) use ($request) {
                $subQuery->where('author_id', $request->author_id);
            });
        }
        return $query;
    }
}
