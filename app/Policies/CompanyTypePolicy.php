<?php

namespace App\Policies;

use App\Models\CompanyType;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CompanyTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole('Super-Admin','Company/Products Owner');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CompanyType $companyType): bool
    {
        return $user->hasAnyRole('Super-Admin', 'Company/Products Owner') || $user->id == $company->user_id;

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole('Super-Admin', 'Company/Products Owner') || $user->id == $company->user_id;

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CompanyType $companyType): bool
    {
        return $user->hasAnyRole('Super-Admin', 'Company/Products Owner') || $user->id == $company->user_id;

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CompanyType $companyType): bool
    {
        return $user->hasAnyRole('Super-Admin', 'Company/Products Owner') || $user->id == $company->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CompanyType $companyType): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CompanyType $companyType): bool
    {
        //
    }
}
