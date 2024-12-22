<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PlaceController::class, 'index']);
Route::get('places/{placeId}', [PlaceController::class, 'show'])->name('places.show');
Route::get('places/{placeId}/book', [PlaceController::class, 'showBook'])->name('places.book');
Route::post('places/{placeId}/book', [PlaceController::class, 'book'])->name('places.book.submit');
Route::get('api/hotels/{hotelId}/rooms', [HotelController::class, 'getRooms']);
