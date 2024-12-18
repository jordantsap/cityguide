<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory;

    public static function defaultPermissions(): array
    {
        return [

            'view-newsletters',
            'create-newsletters',
            'update-newsletters',
            'delete-newsletters',

            'view-users',
            'create-users',
            'update-users',
            'delete-users',

            'view-roles',
            'create-roles',
            'update-roles',
            'delete-roles',

            'view-permissions',
            'create-permissions',
            'update-permissions',
            'delete-permissions',

            'view-posts',
            'create-posts',
            'update-posts',
            'delete-posts',

            'view-companies',
            'create-companies',
            'update-companies',
            'delete-companies',

            'view-products',
            'create-products',
            'update-products',
            'delete-products',

            'view-accommodation',
            'create-accommodation',
            'update-accommodation',
            'delete-accommodation',

            'view-rooms',
            'create-rooms',
            'update-rooms',
            'delete-rooms',

            'view-venues',
            'create-venues',
            'update-venues',
            'delete-venues',

            'view-groups',
            'create-groups',
            'update-groups',
            'delete-groups',

            'view-events',
            'create-events',
            'update-events',
            'delete-events',

            'company-management',
            'group-management',
            'accommodation-management',
            'venue-management',
            'event-management',
            'product-management',
            'order-management',

            'view-fields',
            'create-fields',
            'update-fields',
            'delete-fields',

            // NOT USED

//
//            'view-albums',
//            'create-albums',
//            'update-albums',
//            'delete-albums',

        ];
    }
}
