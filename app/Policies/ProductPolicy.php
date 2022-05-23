<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermissionAccess('list-product');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('add-product');
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess('edit-product');
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete-product');
    }

}
