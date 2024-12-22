<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Hotel;
use App\Models\Place;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all();
        $randomPlaces = Place::inRandomOrder()->limit(3)->get();

        return view('welcome', compact('places', 'randomPlaces'));
    }

    public function showBook($placeId)
    {
        $place = Place::where('placeId', $placeId)->firstOrFail();

        $hotels = $place->hotels;

        return view('places.book', compact('place', 'hotels'));
    }

    public function book(Request $request, $placeId)
    {
        $request->validate([
            'hotelId' => 'required|exists:hotels,hotelId',
            'roomId' => 'required|exists:rooms,roomId',
        ]);

        $place = Place::where('placeId', $placeId)->firstOrFail();
        $hotel = Hotel::where('hotelId', $request->hotelId)->firstOrFail();
        $room = Room::where('roomId', $request->roomId)->firstOrFail();
        $user = Auth::user();

        if(!$user) {
            return redirect()->route('login')->with('error', 'You need to login to book a room.');
        }

        $roomBooking = DB::table('hotelRooms')
            ->where('hotelId', $hotel->hotelId)
            ->where('roomId', $room->roomId)
            ->first();

        if (!$roomBooking || !$roomBooking->available) {
            return redirect()->route('places.show', $place->placeId)->with('error', 'This room is not available.');
        }

        $hotel->rooms()->updateExistingPivot($room->roomId, ['available' => false]);

        Book::create([
            'placeId' => $place->placeId,
            'hotelId' => $hotel->hotelId,
            'roomId' => $room->roomId,
            'userId' => $user->userId,
            'checkIn' => $request->get('checkIn'),
            'checkOut' => $request->get('checkOut'),
        ]);

        return redirect()->route('places.show', $place->placeId)->with('success', 'Room booked successfully.');
    }

    public function show($id)
    {
        $place = Place::where('placeId', $id)->firstOrFail();
        return view('places.show', compact('place'));
    }
}
