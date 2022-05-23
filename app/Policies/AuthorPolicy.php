<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuthorPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermissionAccess('list-author');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('add-author');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('edit-author');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete-author');
    }

}
