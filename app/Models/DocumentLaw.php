<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class DocumentLaw extends Model
{
    protected $table = 'document_law';
    protected $fillable = ['title', 'url', 'description', 'thumbnail'];

    public function scopeSearch($query, $keyword)
    {
        return $query->where('title', 'LIKE', "%{$keyword}%")
            ->orWhere('url', 'LIKE', "%{$keyword}%")->orWhere('description', 'LIKE', "%{$keyword}%");
    }

    public function scopeFilterTitle($query, $request)
    {
        if ($request->name) {
                $query->where('title', $request->name);
        }
        return $query;
    }
}
