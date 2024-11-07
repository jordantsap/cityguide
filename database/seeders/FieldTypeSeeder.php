<?php

namespace Database\Seeders;

use App\Models\FieldType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FieldType::create([
            'name' => 'input',
            'slug' => 'input',
        ]);
        FieldType::create([
            'name' => 'select',
            'slug' => 'select',
        ]);
        FieldType::create([
            'name' => 'checkbox',
            'slug' => 'checkbox',
        ]);
        FieldType::create([
            'name' => 'radio',
            'slug' => 'radio',
        ]);
    }
}
