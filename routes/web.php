<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard'); // ✅ langsung ke dashboard kalau sudah login
    }
    return view('landingPage');
})->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/registerPage', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::get('/loginPage', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/RequestRegister', [AuthController::class, 'register'])->name('RequestRegister');
    Route::post('/RequestLogin', [AuthController::class, 'login'])->name('RequestLogin');
});

Route::middleware(['auth'])->group(function () {
    // Routes that require authentication can be added here
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');  
