<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

        return Response::json(['updated' => true], 201);
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function delete($id)
    {
        User::find($id)->delete();

        return Response::json(['deleted' => true], 200);
    }
}
