<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ProductType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(FieldSeeder::class);
        $this->call(FieldTypeSeeder::class);
        $this->call(ProductTypeSeeder::class);
        $this->call(CompanyTypeSeeder::class);
//        $this->call(GroupTypeSeeder::class);
        $this->call(AccommodationTypeSeeder::class);
        $this->call(RoomTypeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(VariantSeeder::class);


        $user = \App\Models\User::factory()->create([
             'name' => 'Admin User',
             'username' => 'AdminUser',
             'fullname' => 'AdminUser',
             'email' => 'admin@admin.com',
             'password' => Hash::make('123456'),
         ]);

        $user->assignRole('Super-Admin');

    }
}
