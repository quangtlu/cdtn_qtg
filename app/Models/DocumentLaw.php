<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class DocumentLaw extends Model
{
    protected $table = 'document_law';
    protected $fillable = ['title', 'url', 'description', 'thumbnail'];
}
