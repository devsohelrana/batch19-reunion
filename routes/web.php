<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Participant\ParticipantsController;
use App\Http\Controllers\Participant\PaymentController;
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
    Route::get('/profile', [ParticipantsController::class, 'index'])->name('profile');
    Route::post('/profile-detail', [ParticipantsController::class, 'details'])->name('profile.detail');
    Route::patch('/profile', [ParticipantsController::class, 'update'])->name('profile.update');
    Route::get('/participants', [ParticipantsController::class, 'participants'])->name('profile.participants');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/payment', [PaymentController::class, 'index'])->name('profile.payment');
});

require __DIR__ . '/auth.php';
