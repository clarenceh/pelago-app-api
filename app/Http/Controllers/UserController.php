<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use App\User;
use Log;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return all users
        $users = User::all();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Perform field validation
        Log::debug('Perform field validation');
        $this->validate($request, [
            'email' => 'required|unique:users|min:3|max:100',
            'name' => 'required|min:2|max:100',
            'tel' => 'max:20',
            'password' => 'required|min:6|max:20',
            'nationality' => 'max:40'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->nationality = $request->nationality;
        $password = Hash::make($request->password);
        Log::debug("Hashed password: " . $password);
        $user->password = $password;
        
        $user->save();
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find user by id
        return User::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete user by id
        User::destroy($id);
    }

    /**
     * Check existence of user email
     *
     * @param $email
     * @return result
     */
    public function checkEmail($email) {
        Log::debug("Checking Email: " . $email);

        $user = User::where('email', '=', $email)->firstOrFail();
    }
}
