<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/register', fn() => view('auth.register'))->name('register');
Route::get('/login',    fn() => view('auth.login'))->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/login',    [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout',   [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/', fn() => view('home'))->name('home');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
});
