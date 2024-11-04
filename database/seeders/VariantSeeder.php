<?php

namespace Database\Seeders;

use App\Models\Variant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('variants')->truncate();
//        RoomType::factory()->count(5)- create();
        Variant::create([
            'name' => 'Color',
            'slug' => 'color',
        ]);
        Variant::create([
            'name' => 'Size',
            'slug' => 'size',
        ]);
        Variant::create([
            'name' => 'RAM',
            'slug' => 'ram',
        ]);
        Variant::create([
            'name' => 'Processor',
            'slug' => 'processor',
        ]);
    }
}
