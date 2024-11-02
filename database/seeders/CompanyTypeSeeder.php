<?php

namespace Database\Seeders;

use App\Models\CompanyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('company_types')->truncate();
        // $companytype()->setDefaultLocale('el');
        CompanyType::create([
            'name' => 'Retail Sales',
            'slug' => 'retail-sales',
        ]);
        CompanyType::create([
            'name' => 'Coffee',
            'slug' => 'coffee',
        ]);
        CompanyType::create([
            'name' => 'Hairdressers',
            'slug' => 'hairdressers',
        ]);
        CompanyType::create([
            'name' => 'Fast Food',
            'slug' => 'fast-food',
        ]);
        CompanyType::create([
            'name' => 'Ouzeri',
            'slug' => 'oyzodrink',
        ]);
        CompanyType::create([
            'name' => 'Traditional Cafes',
            'slug' => 'traditionalcafes',
        ]);
        CompanyType::create([
            'name' => 'Restaurants',
            'slug' => 'restaurants',
        ]);
        CompanyType::create([
            'name' => 'Butchers',
            'slug' => 'butchers',
        ]);
        CompanyType::create([
            'name' => 'Pasteria',
            'slug' => 'pasteria',
        ]);
        CompanyType::create([
            'name' => 'Grocery store',
            'slug' => 'grocerystore',
        ]);
        CompanyType::create([
            'name' => 'Bougatsa',
            'slug' => 'bougatsa',
        ]);
        CompanyType::create([
            'name' => 'Bakery',
            'slug' => 'bakery',
        ]);
        CompanyType::create([
            'name' => 'Construction Tools',
            'slug' => 'construction-tools',
        ]);
    }
}
