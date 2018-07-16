<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Genre;
use Log;

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
        Log::debug( "Received delete request: ".$name );

        Genre::name($name)->delete();

        return response()->json([
            'deleted' => true
        ]);
    }

    public function add(Request $request)
    {
        Log::debug( "Received add/update request: ".json_encode($request->toArray()) );

        Genre::updateOrCreate(
            [
                'id' => $request->input('id')
            ],
            [
                'name' => $request->input('name'),
            ]
        );

        return response()->json([
            'created' => true
        ]);
    }
}
