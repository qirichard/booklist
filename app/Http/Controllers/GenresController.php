<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Genre;

class GenresController extends Controller
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
        $genres = Genre::all()->toArray();

        return view('genre', compact('genres'));
        // return compact('books', 'genres');
    }

    public function delete($name)
    {
        Genre::name($name)->delete();

        return Response::json(['deleted' => true], 200);
    }

    public function add(Request $request)
    {
        Genre::updateOrCreate(
            [
                'id' => $request->input('id')
            ],
            [
                'name' => $request->input('name'),
            ]
        );

        return Response::json(['created' => true], 201);
    }
}
