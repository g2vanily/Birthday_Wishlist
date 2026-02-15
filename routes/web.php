<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes Web
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\ReservationController;

// Page d'accueil - Choix Visiteur/Admin
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Routes publiques - Wishlist et Réservations
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::get('/gifts/{gift}/reserve', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/gifts/{gift}/reserve', [ReservationController::class, 'store'])->name('reservations.store');

// Routes d'authentification
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Routes Admin - Protégées par authentification
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('gifts', GiftController::class);
    Route::delete('reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
});
