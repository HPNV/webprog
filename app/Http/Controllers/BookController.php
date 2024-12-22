<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Function to display the booking history of the logged-in user
    public function history()
    {
        // Retrieve the bookings of the authenticated user
        $books = Book::where('userId', Auth::id())->get();  // Filter by the logged-in user's ID

        return view('history', compact('books'));
    }
}
