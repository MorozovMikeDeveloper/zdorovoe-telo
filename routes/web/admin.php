<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\SessionsController;

Route::get('/login', function() {
    return view('admin.login');
})->name('admin-auth');

Route::middleware('admin')->group(function() {

    Route::get('/', function() {
        return view('admin.admin');
    });

    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/users', [UserController::class, 'index']);

    Route::prefix('courses')->group(function() {
        Route::get('/', [CourseController::class, 'index']);
        Route::post('/create-course', [CourseController::class, 'store']);
        Route::get('/create-course', function() {
            return view('admin/create-course');
        });
    });

    Route::get('/logout', [SessionsController::class, 'destroy']);
});
