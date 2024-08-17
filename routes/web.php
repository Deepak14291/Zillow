<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\UserAccountController;

// Route::get('/', function () {
//     return inertia('Index/Index');
// });

Route::get('/', [IndexController::class, 'index']);
Route::get('/show', [IndexController::class, 'show']);

Route::resource('listing', ListingController::class)
    ->only(['create', 'store', 'edit', 'update'])->middleware('auth');

Route::resource('listing', ListingController::class)
    ->except(['create', 'store', 'destroy', 'edit', 'update']);

Route::delete('login', [AuthController::class, 'create'])
    ->name('login.delete');

Route::get('login', [AuthController::class, 'create'])
    ->name('login');

Route::post('login', [AuthController::class, 'store'])
    ->name('login.store');

Route::delete('logout', [AuthController::class, 'destroy'])
    ->name('logout');


Route::resource('user-account', UserAccountController::class)
    ->only(['create', 'store']);



Route::prefix('realtor')
    ->name('realtor.')
    ->middleware('auth')
    ->group(function () {
        Route::resource('listing', RealtorListingController::class)
            ->only('destroy', 'index');
    });