<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.users.index')
        ->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   // Just for testing purpose, to display data on screen
        // return $request->all();
        
        //Validate User data after creating
        $request->validate( [
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
            'confirm_pass'=>'required|same:password',
            'image'=>'required'
        ]);

        // to store data on user table
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // to store data coming from user.create to his profile, his image along with id will be stored on profile table
        $profile = new Profile();
        $profile->image = $request->image;
        $profile->user_id = $user->id;
        $profile->save();

        Session::flash('success','User Created');
        return redirect()->route('users.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
