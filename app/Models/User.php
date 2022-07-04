<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    protected $fillable = ["name", "email", "phone", "password", "image", "gender", "dob"];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
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

    public function scopeFilterRole($query, $request)
    {
        if ($request->role_id) {
            $query->whereHas('roles', function ($subQuery) use ($request) {
                $subQuery->where('role_id', $request->role_id);
            });
        }
        return $query;
    }

    public function getDobAttribute()
    {
        if (empty($this->attributes['dob'])) return null;
        return date('d/m/Y', strtotime($this->attributes['dob']));
    }
}
