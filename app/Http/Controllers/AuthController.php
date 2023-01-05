<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        /**
         * Validate The Email Address And Password
         */

        $formFields = [
            'email' => $req->email,
            'password' => $req->password,
        ];


        if (auth()->attempt($formFields)) {
            $req->session()->regenerate();

            return redirect('/dashboard')->with('form-success', 'You Are Logged In');
        }

        return redirect('/login')->with('form-failure', 'Invalid Credentials!');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/')->with('form-success', 'You Are Logged Out');
    }
}