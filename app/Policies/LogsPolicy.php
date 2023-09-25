<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Logs;
use App\Models\User;

class LogsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
        return $user->can('view-any Logs');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Logs $logs): bool
    {
        return true;
        return $user->can('view Logs');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
        return $user->can('create Logs');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Logs $logs): bool
    {
        return true;
        return $user->can('update Logs');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Logs $logs): bool
    {
        return true;
        return $user->can('delete Logs');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Logs $logs): bool
    {
        return true;
        return $user->can('restore Logs');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Logs $logs): bool
    {
        return true;
        return $user->can('force-delete Logs');
    }
}
