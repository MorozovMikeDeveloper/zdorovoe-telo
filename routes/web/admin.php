<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ContentController;

Route::get('/login', function() {
    return view('admin.login');
})->name('admin-auth');

Route::middleware('admin')->group(function() {

    Route::get('/', function() {
        return view('admin.admin');
    });

    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/users', [UserController::class, 'index']);

    Route::prefix('pages')->group(function () {
       Route::get('/', [PageController::class, 'index']);
       Route::get('/create-page', [PageController::class, 'create']);
       Route::get('{page_id}', [PageController::class, 'edit']);
       Route::post('/create-page', [PageController::class, 'store'])->name('page_create');
       Route::put('{page_id}', [PageController::class, 'update'])->name('page_update');
       Route::delete('{page_id}', [PageController::class, 'destroy'])->name('page-delete');
    });

    Route::prefix('contents')->group(function () {
        Route::get('/', [ContentController::class, 'index']);
        Route::get('create-content', [ContentController::class, 'create']);
        Route::get('{content_id}', [ContentController::class, 'edit']);
        Route::post('/create-content', [ContentController::class, 'store'])->name('content_create');
        Route::put('{content_id}', [ContentController::class, 'update'])->name('content_update');
        Route::delete('{content_id}', [ContentController::class, 'destroy'])->name('content-delete');
    });

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
