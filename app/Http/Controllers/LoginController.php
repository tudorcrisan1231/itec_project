<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //
      
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard')->withSuccess('Signed in');
        }
  
        return redirect("/")->withError('Login details are not valid');
    }

    public function signOut() {
        Auth::logout();
        return Redirect('/')->with('success', 'Signed out!');
    }
}
