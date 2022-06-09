<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    protected $fillable = ["name", "email", "phone", "password", "image", "gender", "dob"];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function isAdmin()
    {
        if (Auth::user()->hasRole('user')) {
            return false;
        }
        return true;
    }

    public function scopeSearch($query, $keywork)
    {
        return $query->where('name', 'LIKE', "%{$keywork}%")
            ->orWhere('phone', 'LIKE', "%{$keywork}%")
            ->orWhere('id', 'LIKE', "%{$keywork}%")
            ->orWhere('email', 'LIKE', "%{$keywork}%");
    }
}
