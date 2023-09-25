<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\ClientStatus;
use App\Models\User;

class ClientStatusPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
        if($user->hasPermissionTo('View Client Status')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ClientStatus $clientstatus): bool
    {
        return true;
        return $user->can('view ClientStatus');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
        return $user->can('create ClientStatus');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ClientStatus $clientstatus): bool
    {
        return true;
        return $user->can('update ClientStatus');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ClientStatus $clientstatus): bool
    {
        return true;
        return $user->can('delete ClientStatus');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ClientStatus $clientstatus): bool
    {
        return true;
        return $user->can('restore ClientStatus');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ClientStatus $clientstatus): bool
    {
        return true;
        return $user->can('force-delete ClientStatus');
    }
}
