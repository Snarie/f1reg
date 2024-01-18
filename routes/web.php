<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RaceResultController;
use App\Http\Controllers\LeaderboardController;
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

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/', function () {
    return redirect('/home');
});

//Route::resource('profiles', ProfileController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('profiles', ProfileController::class);
Route::resource('races', RaceController::class);
Route::resource('race-results', RaceResultController::class);

Auth::routes();

Route::get('/leaderboard/upcoming', [LeaderboardController::class,
    'upcomingRaceLeaderboard'])->name('leaderboard.upcoming');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
