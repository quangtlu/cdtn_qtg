<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = ["name", "phone", 'email'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
