<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
Route::get('home', [PlaceController::class, 'index']);
Route::get('/', [PlaceController::class, 'index']);
Route::get('places/{placeId}', [PlaceController::class, 'show'])->name('places.show');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('profile', [AuthController::class, 'showProfile'])->middleware('auth')->name('profile');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('places/{placeId}/book', [PlaceController::class, 'showBook'])->name('places.book');
Route::post('places/{placeId}/book', [PlaceController::class, 'book'])->name('places.book.submit');
Route::get('api/hotels/{hotelId}/rooms', [HotelController::class, 'getRooms']);
