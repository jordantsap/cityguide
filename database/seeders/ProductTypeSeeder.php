<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_types')->truncate();

        ProductType::create([
            'name' => 'Coffee',
            'slug' => 'coffee',
        ]);
        ProductType::create([
            'name' => 'Alcohol',
            'slug' => 'alcohol',
        ]);
        ProductType::create([
            'name' => 'Hand Made',
            'slug' => 'handmade',
        ]);
        ProductType::create([
            'name' => 'Organic',
            'slug' => 'organic',
        ]);
        ProductType::create([
            'name' => 'Sweets',
            'slug' => 'sweets',
        ]);
        ProductType::create([
            'name' => 'Fast Food',
            'slug' => 'fastfood',
        ]);
        ProductType::create([
            'name' => 'Fruits',
            'slug' => 'fruits',
        ]);
        ProductType::create([
            'name' => 'Traditional',
            'slug' => 'traditional',
        ]);
        ProductType::create([
            'name' => 'Pharma',
            'slug' => 'pharma',
        ]);
        ProductType::create([
            'name' => 'Agriculture',
            'slug' => 'agriculture',
        ]);
        ProductType::create([
            'name' => 'Service',
            'slug' => 'service',
        ]);
        ProductType::create([
            'name' => 'Building Materials',
            'slug' => 'buildingmaterials',
        ]);
        ProductType::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
        ]);
    }
}
