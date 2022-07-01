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

    public function scopeSearch($query, $keywork)
    {
        return $query->where('name', 'LIKE', "%{$keywork}%")
            ->orWhere('phone', 'LIKE', "%{$keywork}%")
            ->orWhere('id', 'LIKE', "%{$keywork}%")
            ->orWhere('email', 'LIKE', "%{$keywork}%");
    }

    public function scopeFilterName($query, $request)
    {
        if ($request->name) {
                $query->where('name', $request->name);
        }
        return $query;
    }

    public function scopeFilterEmail($query, $request)
    {
        if ($request->email) {
                $query->where('email', $request->email);
        }
        return $query;
    }

    public function scopeFilterPhone($query, $request)
    {
        if ($request->phone) {
                $query->where('phone', $request->phone);
        }
        return $query;
    }
}
