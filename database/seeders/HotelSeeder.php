<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hotel::factory()->count(20)->create();

        $places = Place::all();
        $hotels = Hotel::all();

        foreach ($places as $place) {
            $randomHotels = $hotels->random(rand(3, 5));

            foreach ($randomHotels as $hotel) {
                DB::table('placeHotels')->insert([
                    'placeId' => $place->placeId,
                    'hotelId' => $hotel->hotelId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
