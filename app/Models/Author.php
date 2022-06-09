<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ["name", "email", "phone", "dob"];

    public function authorProduct()
    {
        return $this->hasMany(AuthorProduct::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function scopeSearch($query, $keywork)
    {
        return $query->where('name', 'LIKE', "%{$keywork}%")
            ->orWhere('email', 'LIKE', "%{$keywork}%")
            ->orWhere('phone', 'LIKE', "%{$keywork}%")
            ->orWhere('id', 'LIKE', "%{$keywork}%");
    }
}
