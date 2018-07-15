<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return Genre::name($name)->delete();
    }

    public function add(Request $request)
    {
        return Genre::updateOrCreate(
            [
                'id' => $request->input('id')
            ],
            [
                'name' => $request->input('name'),
            ]
        );
    }
}
