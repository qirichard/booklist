<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class HomeController extends Controller
{
    //
    public function list()
    {
        $books = Book::all()->toArray();
        // return $environments;
        return view('welcome', compact('books'));
    }
}
