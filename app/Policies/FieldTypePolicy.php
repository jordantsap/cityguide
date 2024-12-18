<?php

namespace App\Policies;

use App\Models\FieldType;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FieldTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole('Super-Admin', 'panel_user');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, FieldType $fieldType): bool
    {
        return $user->id === $fieldType->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('Super-Admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, FieldType $fieldType): bool
    {
        return $user->hasRole('Super-Admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, FieldType $fieldType): bool
    {
        return $user->hasRole('Super-Admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, FieldType $fieldType): bool
    {
        return $user->hasRole('Super-Admin');

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, FieldType $fieldType): bool
    {
        return $user->hasRole('Super-Admin');
    }
}
