<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ["name"];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function scopeSearch($query, $keywork)
    {
        return $query->where('name', 'LIKE', "%{$keywork}%")->orwhere('id', 'LIKE', "%{$keywork}%");
    }
}
