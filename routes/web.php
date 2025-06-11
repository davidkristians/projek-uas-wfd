<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DataController;

// Halaman utama
Route::get('/', function () {
    return view('base.baseapp');
});
Route::get('/home', function () {
    return view('base.baseapp');
});

// Login
Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Register
Route::get('/register', [RegisterController::class, 'registerForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard: redirect berdasarkan role
Route::get('/dashboard', function () {
    $role = auth()->user()->role;

    if ($role == 'admin') {
        return redirect('/admin');
    } elseif ($role == 'user') {
        return redirect('/user');
    } elseif ($role == 'karyawan') {
        return redirect('/karyawan');
    }

    return redirect('/');
})->middleware('auth');

// Halaman per role
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->middleware('auth');

Route::get('/karyawan/dashboard', function () {
    return view('karyawan.dashboard');
})->middleware('auth');

// Show Data
Route::get('/data', [DataController::class, 'dataForm'])->name('data');