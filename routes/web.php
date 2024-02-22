<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Google Auth Route
Route::post('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('google.auth');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/payment', [ProfileController::class, 'payment'])->name('profile.payment');
    Route::get('/participants', [ProfileController::class, 'participants'])->name('profile.participants');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
