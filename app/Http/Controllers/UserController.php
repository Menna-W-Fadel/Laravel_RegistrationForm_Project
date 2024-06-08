<?php

namespace App\Http\Controllers;

use App\Events\NewUserRegistered;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('signUp');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

$validatedData = $request->validate([
    'fullname' => [
        'required',

    ],
    'username' => [
        'required',
        'unique:users',
    ],
    'birthday' => [
        'required',
    ],
    'email' => [
        'required',
        'email',
    ],
    'phone' => [
        'required',
    ],
    'address' => [
        'required',
    ],
    'password' => [
        'required',
        'regex:/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/',
    ],
    'password-confirmation' => [
        'required',
        'same:password',
    ],
]);
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('images', $imageName);

        $user = new User;
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birtdate = $request->birthday;
        $user->address = $request->address;
        $user->password = $request->password;
        $user->image_name = $imageName;

        $user->save();
        event(new NewUserRegistered($user));

        return redirect()->route('user.create')->with('success', 'user registered successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
