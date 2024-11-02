<?php

namespace App\Policies;

use App\Models\AccommodationType;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AccommodationTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Super-Admin','Accommodation/Rooms Owner']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AccommodationType $accommodationType): bool
    {
        return $user->hasAnyRole(['Super-Admin','Accommodation/Rooms Owner']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['Super-Admin','Accommodation/Rooms Owner']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AccommodationType $accommodationType): bool
    {
        return $user->hasAnyRole(['Super-Admin']) || $user->id == $accommodationType->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AccommodationType $accommodationType): bool
    {
        return $user->hasAnyRole(['Super-Admin']) || $user->id == $accommodationType->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AccommodationType $accommodationType): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AccommodationType $accommodationType): bool
    {
        //
    }
}
