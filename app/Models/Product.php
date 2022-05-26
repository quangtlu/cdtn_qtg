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

    public function authorProduct()
    {
        return $this->hasMany(AuthorProduct::class);
    }

    public function author()
    {
        return $this->belongsToMany(Author::class);
    }
}
