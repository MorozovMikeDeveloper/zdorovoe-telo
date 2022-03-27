<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

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
    return view('home');
});

Route::get('/success', function () {
    return view('success');
});

Route::get('/fail', function () {
    return view('fail');
});


Route::post('/signup', [RegisterController::class, 'store']);
Route::post('/login', [SessionsController::class, 'store']);

Route::name('user.')->group(function(){
    Route::view('/account', 'account')->middleware('auth')->name('account');
});


Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');
