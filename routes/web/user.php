<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;

Route::get('/account', [CatalogController::class, 'index'])->middleware('auth')->name('account');
