<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfile extends Controller
{
    //
    public function render($id){
        if(auth()->user()) {
            return view('profile', ['id' => $id]);
        } else {
            return abort(404);
        }
    }
}
