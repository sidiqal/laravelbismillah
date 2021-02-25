<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show() {
        if(Auth::check()) {
            return redirect('/dashboard');

        }
        return view('login');
    }

    public function process(Request $request) {
        $username = $request->username;
        $password = $request->password;
        if(Auth::attempt(['username' => $username, 'password' => $password])) {
            $request->session()->regenerate();

            return redirect('/dashboard');
        } 
        return back()->withInput()->with('error', 'authentication failed');
    }

    function hash() {
        return Hash::make('rahasia');
    }

} 
