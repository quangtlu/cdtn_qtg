<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["name", "pub_date", "regis_date", "owner_id"];

    public function Owners()
    {
        return $this->belongsTo(Owner::class);
    }

    public function authorProduct()
    {
        return $this->hasMany(AuthorProduct::class);
    }
}
