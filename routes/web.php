<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;

// Route::get('/', function () {
//     return Inertia::render('Welcome');
// });

// Route::get('/', function () {
//     // return Inertia::render('welcome');
//     return Inertia('Index/Index');
// });
Route::get('/', [IndexController::class, 'index']);
Route::get('/show', [IndexController::class, 'show']);
Route::resource('listing', ListingController::class)
  ->only(['index', 'show']);