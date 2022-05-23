<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermissionAccess('list-post');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('add-post');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('edit-post');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete-post');
    }

}
