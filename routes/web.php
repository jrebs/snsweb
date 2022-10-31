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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resources([
        'incidents' => IncidentController::class,
        'users'     => UserController::class,
        'series'    => SeriesController::class,
    ]);

    Route::get('/drivers', function () {
        return view('drivers', [
            'drivers' => User::whereHas('series')->get()
        ]);
    })->name('drivers');
});

require __DIR__.'/auth.php';
