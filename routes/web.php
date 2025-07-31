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
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/manageUsers', function () {
        return view('admin.manageUsers');
    })->name('admin.manageUsers');

    Route::get('/manageRental', function () {
        return view('admin.manageRentals');
    })->name('admin.manageRental');

    Route::get('/managePenalty', function () {
        return view('admin.managePenalty');
    })->name('admin.managePenalty');

    Route::get('/manageServices', function () {
        return view('admin.manageLayanan');
    })->name('admin.manageServices');
});


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');  
