<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class UserPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $authUser)
    {
        return $authUser->is_admin;
    }

    public function view(User $authUser, User $user)
    {
        return $authUser->is_admin || $authUser->id === $user->id;
    }

    public function update(User $authUser, User $user)
    {
        return $authUser->is_admin || $authUser->id === $user->id;
    }

    public function delete(User $authUser, User $user)
    {
        return $authUser->is_admin;
    }
}
