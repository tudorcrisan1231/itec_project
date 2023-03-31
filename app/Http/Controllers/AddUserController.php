<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddUserController extends Controller
{
    //
    public function render(){
        if(auth()->user()->role_id ==1) {
            return view('add_users');
        } else {
            return abort(404);
        }
    }
}
