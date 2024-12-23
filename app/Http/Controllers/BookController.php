<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function history()
    {
        $books = Book::where('userId', Auth::id())->get();

        return view('history', compact('books'));
    }
}
