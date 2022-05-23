<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OwnerPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermissionAccess('list-owner');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('add-owner');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('edit-owner');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete-owner');
    }

}
