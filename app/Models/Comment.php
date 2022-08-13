<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'comment', 'status'];
    protected $appends = ["status_name", "status_icon_class", 'status_class'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    protected $casts = [
        'created_at' => 'datetime:H:i:s d/m/Y ',
    ];

    public function getKeyInStatus($key)
    {
        foreach (config('consts.post.status') as $status) {
            if ($this->status == $status['value']) {
                return $status[$key];
            }
        }
    }

    public function getStatusNameAttribute()
    {
        return $this->status == config('consts.post.status.solved.value') ? 'Bình luận hữu ích' : '';
    }

    public function getStatusIconClassAttribute()
    {
        return $this->getKeyInStatus('classIcon');
    }

    public function getStatusClassAttribute()
    {
        return $this->getKeyInStatus('className');
    }
}
