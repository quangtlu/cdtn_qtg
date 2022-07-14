<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $table = 'post_tag';
    
    protected $fillable = ["post_id", "tag_id"];

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
