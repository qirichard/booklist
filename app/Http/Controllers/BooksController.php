<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Book;
use App\Genre;

class BooksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $books = Book::all()->toArray();
        $genres = Genre::all()->toArray();

        return view('admin', compact('books', 'genres'));
        // return compact('books', 'genres');
    }

    public function delete($id)
    {
        Book::find($id)->delete();

        return Response::json(['deleted' => true], 200);
    }

    public function add(Request $request)
    {
        Book::updateOrCreate(
            [
                'id' => $request->input('id')
            ],
            [
                'isbn' => $request->input('isbn'),
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'genres' => implode(',', $request->input('genres') ),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
            ]
        );

        // $this->list();
        return redirect('admin');
    }
}
