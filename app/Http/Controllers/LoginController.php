<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
 
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/dashboard');
        }else{
            return redirect('/login')->with('error', 'El usuario no es válido');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
