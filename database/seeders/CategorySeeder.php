<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Cultural',
            'slug' => 'cultural',
        ]);
        Category::create([
            'name' => 'Educational',
            'slug' => 'education',
        ]);
        Category::create([
            'name' => 'Local',
            'slug' => 'local',
        ]);
        Category::create([
            'name' => 'Country Based',
            'slug' => 'countrybased',
        ]);
        Category::create([
            'name' => 'Sports',
            'slug' => 'sports',
        ]);
        Category::create([
            'name' => 'Technological',
            'slug' => 'technological',
        ]);
        Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);
        Category::create([
            'name' => 'World',
            'slug' => 'world',
        ]);
        Category::create([
            'name' => 'Others',
            'slug' => 'others',
        ]);
    }
}
