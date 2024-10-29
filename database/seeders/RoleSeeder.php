<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_permission = Permission::all();

        $dev_role = new Role();
        $dev_role->name = 'Super-Admin';
        $dev_role->save();
        $dev_role->permissions()->attach($admin_permission);

        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo([
            'view-events',
            'view-products',
            'view-venues',
            'view-companies',
            'view-users',
            'create-users',
            'update-users',
            'create-posts',
            'update-posts',
            'view-posts']);

        /*----------------------------*/
        $role = Role::create(['name' => 'Company/Products Owner']);
        $role->givePermissionTo([
            'company-management',
            'view-companies',
            'create-companies',
            'update-companies',
            'delete-companies',

            'view-products',
            'create-products',
            'update-products',
            'delete-products',
        ]);

        $role = Role::create(['name' => 'Accommodation/Rooms Owner']);
        $role->givePermissionTo(['accommodation-management',
            'view-accommodation',
            'create-accommodation',
            'update-accommodation',
            'delete-accommodation',
            'view-rooms',
            'create-rooms',
            'update-rooms',
            'delete-rooms',
        ]);

        $role = Role::create(['name' => 'Venue/Events Owner']);
        $role->givePermissionTo([
            'venue-management',
            'view-venues',
            'create-venues',
            'update-venues',
            'delete-venues',

            'view-events',
            'create-events',
            'update-events',
            'delete-events',
        ]);
        $role = Role::create(['name' => 'Group/Events Owner']);
        $role->givePermissionTo([
            'group-management',
            'view-groups',
            'create-groups',
            'update-groups',
            'delete-groups',

            'view-events',
            'create-events',
            'update-events',
            'delete-events',
        ]);

        $role = Role::create(['name' => 'Blogger']);
        $role->givePermissionTo(['view-posts', 'create-posts', 'update-posts']);

        $role = Role::create(['name' => 'Customer']);
        $role->givePermissionTo(['order-management']);

//        $role = Role::create(['name' => 'Group Manager']);
//        $role->givePermissionTo(['group-management']);

//        $role = Role::create(['name' => 'Product Supplier']);
//        $role->givePermissionTo(['product-management']);

//        $role = Role::create(['name' => 'Event Host']);
//        $role->givePermissionTo(['event-management']);


        $superadmin_role = Role::where('name','Super-Admin')->first();
        $admin_role = Role::where('name', 'Admin')->first();
        $company_management = Role::where('name','Company/Products Owner')->first();
        $accommodation_management = Role::where('name','Accommodation/Rooms Owner')->first();

        $venue_management = Role::where('name','Venue/Event Owner')->first();
        $group_management = Role::where('name','Group/Event Owner')->first();
        $blog_management = Role::where('name', 'Blogger')->first();
        $customer_role = Role::where('name','Customer')->first();


        $admin = new User();
        $admin->name = 'jordantsap';
        $admin->username = 'jordantsap';
        $admin->fullname = 'JordanTsap';
        $admin->email = 'dev@karvali.local';
        $admin->password = bcrypt('123456');
        $admin->email_verified_at = now();
        $admin->save();
        $admin->roles()->attach($superadmin_role);

        $manager = new User();
        $manager->name = 'manager';
        $manager->username = 'manager';
        $manager->fullname = 'manager';
        $manager->email = 'manager@karvali.local';
        $manager->password = bcrypt('123456');
        $manager->email_verified_at = now();
        $manager->save();
        $manager->roles()->attach($admin_role);

        /*-----------------------------*/
        $company_manager = new User();
        $company_manager->name = 'companyManager';
        $company_manager->username = 'companyManager';
        $company_manager->fullname = 'companyManager';
        $company_manager->email = 'company@karvali.local';
        $company_manager->password = bcrypt('123456');
        $company_manager->email_verified_at = now();
        $company_manager->save();
        $company_manager->roles()->attach($company_management);


        $event_manager = new User();
        $event_manager->name = 'accommodationManager';
        $event_manager->username = 'accommodationManager';
        $event_manager->fullname = 'accommodationManager';
        $event_manager->email = 'accommodation@karvali.local';
        $event_manager->password = bcrypt('123456');
        $event_manager->email_verified_at = now();
        $event_manager->save();
        $event_manager->roles()->attach($accommodation_management);


        $venue_management = new User();
        $venue_management->name = 'venueManager';
        $venue_management->username = 'venueManager';
        $venue_management->fullname = 'venueManager';
        $venue_management->email = 'venue@karvali.local';
        $venue_management->password = bcrypt('123456');
        $venue_management->email_verified_at = now();
        $venue_management->save();
        $venue_management->roles()->attach($venue_management);

        $group_manager = new User();
        $group_manager->name = 'groupManager';
        $group_manager->username = 'groupManager';
        $group_manager->fullname = 'venueManager';
        $group_manager->email = 'group@karvali.local';
        $group_manager->password = bcrypt('123456');
        $group_manager->email_verified_at = now();
        $group_manager->save();
        $group_manager->roles()->attach($group_management);


        $blogger = new User();
        $blogger->name = 'blogger';
        $blogger->username = 'blogger';
        $blogger->fullname = 'blogger';
        $blogger->email = 'blogger@karvali.local';
        $blogger->password = bcrypt('123456');
        $blogger->email_verified_at = now();
        $blogger->save();
        $blogger->roles()->attach($blog_management);

    }
}
