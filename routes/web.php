<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CheckupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TreatmentController;

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

// Route::get('/', function () {
//     return view('layouts.admin');
// });
Route::get('/', fn() => redirect()->route('dashboard.index'));

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard.index');

Route::resource('owner', OwnerController::class);
Route::resource('pet', PetController::class);
Route::resource('checkup', CheckupController::class);
Route::resource('treatment', TreatmentController::class);

