<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermissionAccess('list-permission');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('add-permission');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete-permission');
    }

}
