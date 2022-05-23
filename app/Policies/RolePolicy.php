<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermissionAccess('list-role');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('add-role');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('edit-role');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete-role');
    }

}
