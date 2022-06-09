<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['question', 'answer'];

    public function scopeSearch($query, $keyword)
    {
        return $query->where('question', 'LIKE', "%{$keyword}%")
            ->orWhere('answer', 'LIKE', "%{$keyword}%")
            ->orWhere('id', 'LIKE', "%{$keyword}%");
    }
}
