<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ["name", "email", "phone", "password"];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function checkPermissionAccess($permissionCheck)
    {
        $roles = auth()->user()->roles;

        foreach ($roles as $role) {
            $permissions = $role->permissions;
            if ($permissions->contains('key_code', $permissionCheck)) {
                return true;
            }
        }
        return false;
    }
}
