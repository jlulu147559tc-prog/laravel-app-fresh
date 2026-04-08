<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::all();
        return view('user_registration.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('user_registration.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'first_name'     => $request->first_name,
            'last_name'      => $request->last_name,
            'middle_name'    => $request->middle_name,
            'nickname'       => $request->nickname,
            'age'            => $request->age,
            'address'        => $request->address,
            'contact_number' => $request->contact_number,
            'email'          => $request->email,
            'password'       => Hash::make($request->password), 
        ]);

        return redirect('/register');
    }

    /**
     * Display the specified user (Edit Form).
     */
    public function edit(User $user)
    {
        return view('user_registration.show', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'first_name'     => $request->first_name,
            'last_name'      => $request->last_name,
            'middle_name'    => $request->middle_name,
            'nickname'       => $request->nickname,
            'age'            => $request->age,
            'address'        => $request->address,
            'contact_number' => $request->contact_number,
            'email'          => $request->email,
            'password'       => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect('/register');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/register');
    }
}