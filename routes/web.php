<?php

use App\Http\Controllers\AddUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Mail\AddUserEmail;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(auth()->user()) {
        return redirect('/dashboard');
    } else {
        return view('login');
    }
});
Route::post('/login',  [LoginController::class, 'login']);
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');

Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/add-users',  [AddUserController::class, 'render'])->name('add-users');


Route::get('send-email', [AddUserEmail::class, 'sendEmail']);

// Route::group(['middleware' => 'auth'], function () {

// });