<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// =====================
// 🔹 Halaman Publik (Tanpa Login)
// =====================
Route::view('/', 'beranda')->name('beranda');
Route::view('/tentang', 'tentang')->name('tentang');
Route::view('/bisnis', 'bisnis')->name('bisnis');
Route::view('/proyek', 'proyek')->name('proyek');
Route::view('/kontak', 'kontak')->name('kontak');

// =====================
// 🔹 Dashboard (Login)
// =====================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// =====================
// 🔹 Produk (CRUD bisa diakses langsung tanpa login)
// =====================
Route::resource('products', ProductController::class);

// =====================
// 🔹 Profil (Login diperlukan)
// =====================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =====================
// 🔹 Rute Autentikasi
// =====================
require __DIR__ . '/auth.php';
