<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all(); // Fetch all places
        $randomPlaces = Place::inRandomOrder()->limit(3)->get(); // Fetch 3 random places
        
        return view('welcome', compact('places', 'randomPlaces')); // Pass both to the view
    }

    // Method to show a specific place's details
    public function show($id)
    {
        $place = Place::where('placeId', $id)->firstOrFail(); // Fetch single place
        return view('places.show', compact('place')); // Ensure 'place' is an object, not an array
    }
}
