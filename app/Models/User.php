<?php

namespace App\Models;

use Attribute;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    protected $fillable = ["name", "email", "phone", "password", "image", "gender", "dob"];

    protected $append = ['age', 'gender_text'];

    public function getAgeAttribute()
    {
        $age = Carbon::parse($this->attributes['dob'])->age;
        return $age > 0 ? $age : 'Chưa rõ';
    }

    public function getGenderTextAttribute()
    {
        foreach (config('consts.user.gender') as $gender) {
            if($this->gender == $gender['value']) {
                return $gender['name'];
            }
        }
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function rooms()
    {
        return $this->hasMany(Chatroom::class, 'connector_id');
    }

    public function chatrooms()
    {
        return $this->belongsToMany(Chatroom::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'user_category');
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
}
