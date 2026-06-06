<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Redirect halaman utama ke dashboard / login
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Grup Route yang Wajib Login (Auth)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Semua User (Admin & User biasa) bisa akses halaman dashboard ini untuk melihat produk
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');

    // Pengelolaan Profile bawaan Breeze (Fitur Wajib No.7)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // PROTEKSI ROLE ADMIN: Hanya admin yang bisa memicu mutasi data (C-U-D)
    Route::middleware(['role:admin'])->group(function () {
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
});

require __DIR__.'/auth.php';