<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;


Route::get('/', [UserController::class, 'show'])->middleware('auth')->name('user');
Route::get('/orders', [OrderController::class])->middleware('auth')->name('orders');
