<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermissionAccess('list-message');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('add-message');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('edit-message');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete-message');
    }

}
