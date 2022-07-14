<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ["name", "dob", "email", "phone", "gender"];

    public function authorProduct()
    {
        return $this->hasMany(AuthorProduct::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'author_product');
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where('name', 'LIKE', "%{$keyword}%")
            ->orWhere('phone', 'LIKE', "%{$keyword}%")
            ->orWhere('id', 'LIKE', "%{$keyword}%")
            ->orWhere('email', 'LIKE', "%{$keyword}%");
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

    public function scopeFilterGender($query, $request)
    {
        if ($request->gender) {
                $query->where('gender', $request->gender);
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

    public function getDobAttribute()
    {
        if (empty($this->attributes['dob'])) return null;
        return date('d/m/Y', strtotime($this->attributes['dob']));
    }
}
