<?php

use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PlaceController::class, 'index']);
Route::get('places/{placeId}', [PlaceController::class, 'show'])->name('places.show');

