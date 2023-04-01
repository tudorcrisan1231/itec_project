<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        
        if(auth()->user()) {
            return view('dashboard');
        } else {
            return abort(404);
        }
    }
}
