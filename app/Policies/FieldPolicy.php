<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Field;
use Illuminate\Auth\Access\HandlesAuthorization;

class FieldPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Field $field): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole('Super-Admin', 'panel_user');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Field $field): bool
    {
        return $user->hasAnyRole('Super-Admin', 'panel_user');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Field $field): bool
    {
        return $user->hasAnyRole('Super-Admin', 'panel_user');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasAnyRole('Super-Admin', 'panel_user');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Field $field): bool
    {
        return $user->hasAnyRole('Super-Admin', 'panel_user');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->hasAnyRole('Super-Admin', 'panel_user');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Field $field): bool
    {
        return $user->hasAnyRole('Super-Admin', 'panel_user');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->hasAnyRole('Super-Admin', 'panel_user');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Field $field): bool
    {
        return $user->can('replicate_field');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_field');
    }
}
