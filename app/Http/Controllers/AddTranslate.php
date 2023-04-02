<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddTranslate extends Controller
{
    //
    public function render(){
        if(auth()->user() && auth()->user()->role_id ==1) {
            return view('add-translates');
        } else {
            return abort(404);
        }
    }
}
