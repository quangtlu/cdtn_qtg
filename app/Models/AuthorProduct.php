<?php

namespace App\app\Models;

use App\Models\Author;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class AuthorProduct extends Model
{
    protected $fillable = ["author_id", "product_id"];

    public function Author()
    {
        return $this->belongsTo(Author::class);
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
