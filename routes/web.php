<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [PlaceController::class, 'index'])->name('home');
Route::get('places/{placeId}', [PlaceController::class, 'show'])->name('places.show');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('profile', [AuthController::class, 'showProfile'])->name('profile');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('places/{placeId}/book', [PlaceController::class, 'showBook'])->name('places.book');
    Route::post('places/{placeId}/book', [PlaceController::class, 'book'])->name('places.book.submit');
});

// API routes
Route::get('api/hotels/{hotelId}/rooms', [HotelController::class, 'getRooms']);
