<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::prefix('item')->group(function () {
        Route::get('/', function () {
            return view('admin.item.index');
        });

        Route::get('add', function () {
            return view('admin.item.add');
        });
        Route::get('/id/edit', function () {
            return view('admin.item.edit');
        });
    });

    Route::prefix('kategori')->group(function () {
        Route::get('/', function () {
            return view('admin.kategori.index');
        });

        Route::get('add', function () {
            return view('admin.kategori.add');
        });
        Route::get('/id/edit', function () {
            return view('admin.kategori.edit');
        });
    });
});

Route::middleware(['auth', 'role:penyewa'])->group(function () {
    Route::get('/penyewa', function () {
        return view('penyewa.dashboard');
    })->name('penyewa.dashboard');
});
