<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermissionAccess('list-comment');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('add-comment');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('edit-comment');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete-comment');
    }

}
