<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthorProduct extends Model
{
    protected $table = 'author_product';
    protected $fillable = ["author_id", "product_id"];
}
