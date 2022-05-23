<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermissionAccess('list-user');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('add-user');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('edit-user');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete-user');
    }

}
