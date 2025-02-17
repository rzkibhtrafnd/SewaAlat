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

    // Resource route for kategori with named routes
    Route::resource('kategori', KategoriController::class)->names([
        'index' => 'admin.kategori.index',
        'create' => 'admin.kategori.create',
        'store' => 'admin.kategori.store',
        'show' => 'admin.kategori.show',
        'edit' => 'admin.kategori.edit',
        'update' => 'admin.kategori.update',
        'destroy' => 'admin.kategori.destroy',
    ]);

    // Item Routes
    Route::prefix('item')->group(function () {
        Route::get('/', function () {
            return view('admin.item.index');
        })->name('admin.item.index');

        Route::get('add', function () {
            return view('admin.item.add');
        })->name('admin.item.add');
    });

    // Kategori Routes (for additional views, not for resource controller)
    Route::prefix('kategori')->group(function () {
        Route::get('add', function () {
            return view('admin.kategori.add');
        })->name('admin.kategori.add');

        Route::get('{id}/edit', function () {
            return view('admin.kategori.edit');
        })->name('admin.kategori.edit');
    });
});

// Penyewa Routes
Route::middleware(['auth', 'role:penyewa'])->group(function () {
    Route::get('/penyewa', function () {
        return view('penyewa.dashboard');
    })->name('penyewa.dashboard');
});
