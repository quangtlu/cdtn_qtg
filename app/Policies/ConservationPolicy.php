<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConservationPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        return $user->checkPermissionAccess('list-conservation');
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess('add-conservation');
    }


}
