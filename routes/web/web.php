<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::middleware('auth')->prefix('payment')->group(function(){
    Route::post('/create', [PaymentController::class, 'create'])->middleware('verified')->name('payment_create');
    Route::get('/notification', [PaymentController::class, 'notification'])->middleware('verified')->name('payment_notification');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect(route('user'));
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/', [HomeController::class, 'index']);

Route::get('/success', function () {
    return view('success');
});

Route::get('/fail', function () {
    return view('fail');
});

Route::get('/signup', function () {
    if(Auth::check()){
        return redirect(route('user'));
    }
    return view('signup');
})->name('signup_form');

Route::get('/login', function () {
    if(Auth::check()){
        return redirect(route('user'));
    }
    return view('login');
})->name('login_form');

Route::get('/login/social-auth/{provider}', [SocialController::class, 'redirectToProvider'])->name('auth.social');
Route::get('/login/social-auth/{provider}/callback', [SocialController::class, 'handleProviderCallback'])->name('auth.social.callback');

Route::post('/signup', [RegisterController::class, 'store']);
Route::post('/login', [SessionsController::class, 'store']);

Route::get('/courses', [CatalogController::class, 'index']);

Route::get('/courses/{slug}', [CatalogController::class, 'show'])->name('courses.show');

Route::get('/logout', [SessionsController::class, 'destroy'])->middleware('auth');
