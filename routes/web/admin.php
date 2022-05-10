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
        Route::get('/create-course', function() {
            return view('admin.create-course');
        });
        Route::get('{course_id}', [CourseController::class, 'show'])->name('course-detail');
        Route::post('/create-course', [CourseController::class, 'store']);
        Route::put('/{course_id}/update', [CourseController::class, 'update'])->name('course-update');
        Route::delete('/{course_id}/delete', [CourseController::class, 'destroy'])->name('course-delete');
    });

    Route::get('/logout', [SessionsController::class, 'destroy']);
});
