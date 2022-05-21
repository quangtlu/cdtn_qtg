<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ["name", "dob"];

    public function authorProduct()
    {
        return $this->hasMany(AuthorProduct::class);
    }
}
