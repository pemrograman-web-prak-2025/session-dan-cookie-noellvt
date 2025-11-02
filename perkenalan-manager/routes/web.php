<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerkenalanController;
use Illuminate\Support\Facades\Route;

// Redirect root
Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/perkenalan');
    }
    return redirect('/login');
});

// Authentication Routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// CRUD Routes
Route::middleware('auth')->group(function () {
    Route::get('/perkenalan', [PerkenalanController::class, 'index'])->name('perkenalan.index');
    Route::get('/perkenalan/create', [PerkenalanController::class, 'create'])->name('perkenalan.create');
    Route::post('/perkenalan', [PerkenalanController::class, 'store'])->name('perkenalan.store');
    Route::get('/perkenalan/{perkenalan}/edit', [PerkenalanController::class, 'edit'])->name('perkenalan.edit');
    Route::put('/perkenalan/{perkenalan}', [PerkenalanController::class, 'update'])->name('perkenalan.update');
    Route::delete('/perkenalan/{perkenalan}', [PerkenalanController::class, 'destroy'])->name('perkenalan.destroy');
});