<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole('Super-Admin','Super-Admin');//$user->can('delete_role');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Permission $permission): bool
    {
        return $user->hasAnyRole('Super-Admin');//$user->can('delete_role');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole('Super-Admin');//$user->can('delete_role');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Permission $permission): bool
    {
        return $user->hasAnyRole('Super-Admin');//$user->can('delete_role');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Permission $permission): bool
    {
        return $user->hasAnyRole('Super-Admin');//$user->can('delete_role');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasAnyRole('Super-Admin');//$user->can('delete_role');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Permission $permission): bool
    {
        return $user->hasAnyRole('Super-Admin');//$user->can('delete_role');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->hasAnyRole('Super-Admin');//$user->can('delete_role');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Permission $permission): bool
    {
        return $user->can('restore_permission');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_permission');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Permission $permission): bool
    {
        return $user->can('replicate_permission');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_permission');
    }
}
