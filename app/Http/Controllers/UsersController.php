<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

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

        //back to user list
        return redirect('user');
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function delete($id)
    {
        return User::find($id)->delete();
    }
}
