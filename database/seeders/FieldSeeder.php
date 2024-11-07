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
            'title' => 'select',
            'type' => 'text',
            'class' => 'form-control',
            'placeholder' => 'Please Select',
            'multiple' => 'true',
            'name' => 'name',
            'required' => 'true',
            'field_type_id' => rand(1, 2),
        ]);
        Field::create([
            'title' => 'select',
            'type' => 'text',
            'class' => 'form-control',
            'placeholder' => 'Please Select',
            'multiple' => 'true',
            'name' => 'name',
            'required' => 'true',
            'field_type_id' => rand(1, 2),
        ]);
    }
}
