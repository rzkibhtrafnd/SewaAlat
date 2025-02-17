<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;

// Authentication Routes
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes with Middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Define the resource route for kategori with names
    Route::resource('kategori', KategoriController::class)->names([
        'index' => 'admin.kategori.index',
        'create' => 'admin.kategori.create',
        'store' => 'admin.kategori.store',
        'show' => 'admin.kategori.show',
        'edit' => 'admin.kategori.edit',
        'update' => 'admin.kategori.update',
        'destroy' => 'admin.kategori.destroy',
    ]);

    Route::prefix('item')->group(function () {
        Route::get('/', function () {
            return view('admin.item.index');
        })->name('admin.item.index');

        Route::get('add', function () {
            return view('admin.item.add');
        })->name('admin.item.add');

    Route::prefix('kategori')->group(function () {
        Route::get('/', function () {
            return view('admin.kategori.index');
        })->name('admin.kategori.index');

        Route::get('add', function () {
            return view('admin.kategori.add');
        });
        Route::get('/id/edit', function () {
            return view('admin.kategori.edit');
        });

    });
    
});

// Penyewa Routes
Route::middleware(['auth', 'role:penyewa'])->group(function () {
    Route::get('/penyewa', function () {
        return view('penyewa.dashboard');
    })->name('penyewa.dashboard');
});