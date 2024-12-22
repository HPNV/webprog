<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Place;
use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::factory(20)->create();

        $hotels = Hotel::all();
        $rooms = Room::all();

        if ($hotels->isEmpty() || $rooms->isEmpty()) {
            $this->command->warn('No places or rooms available. Run the PlaceSeeder and RoomSeeder first.');
            return;
        }

        $hotels->each(function ($hotel) use ($rooms) {
            $assignedRooms = $rooms->random(rand(3, 5));

            foreach ($assignedRooms as $room) {
                DB::table('hotelRooms')->insert([
                    'hotelId' => $hotel->hotelId,
                    'roomId' => $room->roomId,
                    'available' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });
    }
}
