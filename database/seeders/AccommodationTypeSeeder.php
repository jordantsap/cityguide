<?php

namespace Database\Seeders;

use App\Models\AccommodationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccommodationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accommodation_types')->truncate();

        AccommodationType::create([
            'name' => 'Hotel',
            'slug' => 'hotel',
        ]);
        AccommodationType::create([
            'name' => 'Camping',
            'slug' => 'camping',
        ]);
        AccommodationType::create([
            'name' => 'Apartment',
            'slug' => 'apartment',
        ]);
        AccommodationType::create([
            'name' => 'Villa',
            'slug' => 'villa',
        ]);
        AccommodationType::create([
            'name' => 'Hostel',
            'slug' => 'Hostel',
        ]);
        AccommodationType::create([
            'name' => 'Vacation Rental',
            'slug' => 'Vacation Rental',
        ]);
        AccommodationType::create([
            'name' => 'Resort',
            'slug' => 'Resort',
        ]);
        AccommodationType::create([
            'name' => 'Motel',
            'slug' => 'motel',
        ]);
    }
}
