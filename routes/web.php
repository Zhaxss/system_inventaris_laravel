<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\Dashboardczontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

// test error
Route::get('/test-error/{code}', function ($code) {
    abort($code);
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'register']);
    Route::get('/register/admin', [AuthController::class, 'register_admin']);
    Route::post('/register/submit', [AuthController::class, 'register_submit']);    
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/submit', [AuthController::class, 'login_submit']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [Dashboardczontroller::class, 'dashboard']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/manajemen_barang', [BarangController::class, 'manajemen_barang']);
    Route::post('/manajemen_submit', [BarangController::class, 'manajemen_submit']);
    Route::get('/manajemen_barang/edit/{id}', [BarangController::class, 'edit']);
    Route::post('/manajemen_barang/edit/submit/{id}', [BarangController::class, 'edit_submit']);
    Route::post('/manajemen_barang/hapus/{id}', [BarangController::class, 'hapus']);

    Route::get('/barang/arsip', [BarangController::class, 'arsip_tampil']);
    Route::post('/barang/hapus/{id}', [BarangController::class, 'delete'])->name('barang.hapus');
    Route::post('/barang/restore/{id}', [BarangController::class, 'restore'])->name('barang.restore');

    Route::get('/peminjaman', [PeminjamanController::class, 'peminjam_tampil']);
    Route::get('/peminjaman/{id}', [PeminjamanController::class, 'show']);
    Route::post('/peminjaman/submit', [PeminjamanController::class, 'peminjaman_submit']);
    
    // Route::post('/peminjaman/edit/submit/{id}', [PeminjamanController::class, 'peminjaman_edit']);
    // Route::post('/peminjaman/hapus/{id}', [PeminjamanController::class, 'hapus']);

    Route::get('/pengembalian', [PengembalianController::class, 'pengembalian_tampil']);
    Route::get('/pengembalian/{id}', [PengembalianController::class, 'show']);
    Route::post('/pengembalian/{id}', [PengembalianController::class, 'store'])->name('pengembalian.store');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');

    Route::get('/daftar_pinjam', [DaftarController::class, 'index']);

});
