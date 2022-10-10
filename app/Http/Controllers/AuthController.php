<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register

    public function register() {
        return view('auth.register');
    }

    public function doRegister(Request $request) {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|string|min:6',
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect( route('allBooks'));
    }

    // Login

    public function login() {
        return view('auth.login');
    }

    public function doLogin(Request $request) {
        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|string|min:6',
        ]);
        $email = $request->email;
        $password = $request->password;

        if(! Auth::attempt(['email' => $email, 'password' => $password]) ) {
            return redirect( route('login') );
        }

        return redirect( route('allBooks') );
    }

    // Logout

    public function logout() {

        // Delete Session
        Auth::logout();

        return redirect( route('login') );
    }
}
