<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCateory extends Model
{
    protected $table = 'user_cateory';
    protected $fillable = ['user_id', 'category_id'];
}
