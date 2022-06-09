<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['question', 'answer'];

    public function scopeSearch($query, $keywork)
    {
        return $query->where('question', 'LIKE', "%{$keywork}%")
            ->orWhere('answer', 'LIKE', "%{$keywork}%");
    }
}
