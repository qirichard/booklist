<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Log;

class UsersController extends Controller
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

    public function list()
    {
        $users = User::all()->toArray();
        // return $users;
        return view('user', $users);
    }

    public function update(Request $request)
    {
        Log::debug( "Received add/update request: ".json_encode($request->toArray()) );

        User::updateOrCreate(
            [
                'email' => $request->input('email')
            ],
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => $request->input('role'),
            ]
        );

        return response()->json([
            'updated' => true
        ]);
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function delete($id)
    {
        Log::debug( "Received delete request: ".$id );

        User::find($id)->delete();

        return response()->json([
            'deleted' => true
        ]);
    }
}
