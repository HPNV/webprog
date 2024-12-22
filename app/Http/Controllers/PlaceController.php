<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all();
        $randomPlaces = Place::inRandomOrder()->limit(3)->get();
        
        return view('welcome', compact('places', 'randomPlaces'));
    }

    public function show($id)
    {
        $place = Place::where('placeId', $id)->firstOrFail();
        return view('detail', compact('place'));
    }
}
