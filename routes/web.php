<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\SpecieController;
use App\Http\Controllers\StarshipController;
use App\Http\Controllers\VehicleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function() {
    Route::get('/signup', [AuthController::class, 'getSignup'])->name('get.signup');
    Route::post('/auth/signup', [AuthController::class, 'postSignup'])->name('post.signup');

    Route::get('/signin', [AuthController::class, 'getSignin'])->name('get.signin');
    Route::post('/auth/signin', [AuthController::class, 'postSignin'])->name('post.signin');
});

Route::get('/signout', [AuthController::class, 'getSignout'])->name('get.signout');

Route::middleware('auth')->group(function() {
    Route::resource('people', PeopleController::class);
    Route::resource('planets', PlanetController::class);
    Route::resource('films', FilmController::class);
    Route::resource('species', SpecieController::class)->parameters(['species' => 'specie']);;
    Route::resource('starships', StarshipController::class);
    Route::resource('vehicles', VehicleController::class);
});


