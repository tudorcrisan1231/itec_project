<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeMatches extends Controller
{
    //
    public function render(){
        if(auth()->user() && auth()->user()->role_id ==1) {
            return view('employee_matches');
        } else {
            return abort(404);
        }
    }
}
