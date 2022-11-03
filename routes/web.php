<?php

use App\Http\Controllers\IncidentController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/drivers', function () {
    return view('drivers', [
        'drivers' => User::whereHas('series')->get()
    ]);
})->name('drivers');

Route::resource('users', UserController::class);

Route::resource('series', SeriesController::class);

Route::resource('incidents', IncidentController::class)
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
