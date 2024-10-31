<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Field::create([
            'title' => 'input',
            'type' => 'text',
            'class' => '',
            'placeholder' => 'politics',
            'multiple' => 'false',
            'name' => 'name',
            'field_type_id' => rand(1, 2),
        ]);
        Field::create([
            'title' => 'select',
            'type' => '',
            'class' => '',
            'placeholder' => 'Please Select',
            'multiple' => 'true',
            'name' => 'name',
            'field_type_id' => rand(1, 2),
        ]);
    }
}
