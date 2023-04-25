<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function render(){
        if(auth()->user()){
            return view('notification');
        } else {
            return abort(404);
        }
    }
}
