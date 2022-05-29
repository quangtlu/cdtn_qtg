<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    protected $fillable = ["name", "email", "phone", "password"];

    public function isAdmin ()
    {
        if (Auth::user()->hasRole('user')) {
            return false;
        }
        return true;
    }
}
