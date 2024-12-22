<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function getRooms($hotelId)
    {
        $hotel = Hotel::findOrFail($hotelId);
        $rooms = $hotel->rooms()->get();
        return response()->json(['rooms' => $rooms]);
    }
}
