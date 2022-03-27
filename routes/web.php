<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/signup', function () {
    if(Auth::check()){
        return view('account');
    }
    return view('signup');
})->name('signup_form');

Route::get('/login', function () {
    if(Auth::check()){
        return view('account');
    }
    return view('login');
})->name('login_form');

Route::post('/signup', [RegisterController::class, 'store']);
Route::post('/login', [SessionsController::class, 'store']);

Route::prefix('user')->group(function(){
    Route::view('/account', 'account')->middleware('auth')->name('account');
});

Route::get('cabinet', [CatalogController::class, 'index']);

Route::get('/logout', [SessionsController::class, 'destroy'])->middleware('auth');
