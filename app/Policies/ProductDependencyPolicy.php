<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\ProductDependency;
use App\Models\User;

class ProductDependencyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
        return $user->can('view-any ProductDependency');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ProductDependency $productdependency): bool
    {
        return true;
        return $user->can('view ProductDependency');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
        return $user->can('create ProductDependency');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ProductDependency $productdependency): bool
    {
        return true;
        return $user->can('update ProductDependency');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ProductDependency $productdependency): bool
    {
        return true;
        return $user->can('delete ProductDependency');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ProductDependency $productdependency): bool
    {
        return true;
        return $user->can('restore ProductDependency');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ProductDependency $productdependency): bool
    {
        return true;
        return $user->can('force-delete ProductDependency');
    }
}
