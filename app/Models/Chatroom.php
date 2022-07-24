<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    protected $fillable = ['name', 'description', 'post_id', 'connector_id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function connector()
    {
        return $this->belongsTo(User::class, 'connector_id');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class );
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where('name', 'LIKE', "%{$keyword}%")
            ->orWhere('description', 'LIKE', "%{$keyword}%");
    }
}
