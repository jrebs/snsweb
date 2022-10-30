<?php

use App\Http\Controllers\IncidentController;
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
    ]);
    Route::get('/drivers', function () {
        return User::whereHas('series')->paginate(15);
    });
    Route::get('/stewards', function () {
        return User::role('steward')->paginate(15);
    });
});

require __DIR__.'/auth.php';
