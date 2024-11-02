<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('room_types')->truncate();
//        RoomType::factory()->count(5)- create();
        RoomType::create([
            'name' => 'Single',
            'slug' => 'singleen',
        ]);
        RoomType::create([
            'name' => 'Double',
            'slug' => 'double',
        ]);
        RoomType::create([
            'name' => 'Triple',
            'slug' => 'triple',
        ]);
        RoomType::create([
            'name' => 'Family',
            'slug' => 'family',
        ]);
    }
}
