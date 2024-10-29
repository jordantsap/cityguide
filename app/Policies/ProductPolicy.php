<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['Super-Admin','Company/Products Owner']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Product $product): bool
    {
        return $user->hasRole('Company/Products Owner');//$user->can('delete_role');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('Company/Products Owner');//$user->can('delete_role');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Product $product): bool
    {
        return $user->id === $product->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Product $product): bool
    {
        return $user->id === $product->user_id;
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasAnyRole('Company/Products Owner');//$user->can('delete_role');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Product $product): bool
    {
        return $user->hasAnyRole('Super-Admin');//$user->can('delete_role');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return false;//$user->can('force_delete_any_product');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Product $product): bool
    {
        return $user->can('restore_product');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_product');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Product $product): bool
    {
        return $user->can('replicate_product');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_product');
    }
}
