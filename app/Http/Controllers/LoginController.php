<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function show() {
        return view('login');
    }

    public function process(Request $request) {
        $username = $request->username;
        $password = $request->password;
        $user = User::where('username', $username)->first();
        if(!$user) {
            // return redirect(route('login.show')); // if user not found redirect back to login with error message
            return back()->withInput()->with('error', $username . ' not found');
        }

        if($user->password != $password) {
            return back()->withInput()->with('error', 'wrong password');
        }
        return $user;
    }
} 
