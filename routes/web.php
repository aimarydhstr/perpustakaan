<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\LaporanController;

Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('index');
Route::post('/auth/login', [LoginController::class, 'login'])->middleware('guest')->name('login');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('level:1')->name('dashboard');

    Route::prefix('anggota')->middleware('level:2')->group(function(){
        Route::get('/', [AnggotaController::class, 'index'])->name('anggota');
        Route::get('/data', [AnggotaController::class, 'data'])->name('anggota.data');
        Route::get('/get/{id}', [AnggotaController::class, 'show'])->name('anggota.get');
        Route::get('/create', [AnggotaController::class, 'create'])->name('anggota.create');
        Route::post('/store', [AnggotaController::class, 'store'])->name('anggota.store');
        Route::put('/activate/{id}', [AnggotaController::class, 'activate'])->name('anggota.activate');
        Route::get('/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
        Route::put('/update/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
        Route::delete('/delete/{id}', [AnggotaController::class, 'destroy'])->name('anggota.delete');
    });

    Route::prefix('/buku')->middleware('level:2')->group(function(){
        Route::get('/', [BukuController::class, 'index'])->name('buku');
        Route::get('/data', [BukuController::class, 'data'])->name('buku.data');
        Route::get('/get/{id}', [BukuController::class, 'show'])->name('buku.get');
        Route::get('/create', [BukuController::class, 'create'])->name('buku.create');
        Route::post('/store', [BukuController::class, 'store'])->name('buku.store');
        Route::get('/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
        Route::put('/update/{id}', [BukuController::class, 'update'])->name('buku.update');
        Route::delete('/delete/{id}', [BukuController::class, 'destroy'])->name('buku.delete');
    });

    Route::prefix('/kategori')->middleware('level:2')->group(function(){
        Route::get('/', [KategoriController::class, 'index'])->name('kategori');
        Route::get('/data', [KategoriController::class, 'data'])->name('kategori.data');
        Route::get('/{id}', [KategoriController::class, 'show'])->name('kategori.get');
        Route::post('/store', [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::put('/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::delete('/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');
    });

    Route::prefix('/penulis')->middleware('level:2')->group(function(){
        Route::get('/', [PenulisController::class, 'index'])->name('penulis');
        Route::get('/data', [PenulisController::class, 'data'])->name('penulis.data');
        Route::get('/{id}', [PenulisController::class, 'show'])->name('penulis.get');
        Route::post('/store', [PenulisController::class, 'store'])->name('penulis.store');
        Route::get('/edit/{id}', [PenulisController::class, 'edit'])->name('penulis.edit');
        Route::put('/update/{id}', [PenulisController::class, 'update'])->name('penulis.update');
        Route::delete('/delete/{id}', [PenulisController::class, 'destroy'])->name('penulis.delete');
    });

    Route::prefix('/penerbit')->middleware('level:2')->group(function(){
        Route::get('/', [PenerbitController::class, 'index'])->name('penerbit');
        Route::get('/data', [PenerbitController::class, 'data'])->name('penerbit.data');
        Route::get('/{id}', [PenerbitController::class, 'show'])->name('penerbit.get');
        Route::post('/store', [PenerbitController::class, 'store'])->name('penerbit.store');
        Route::get('/edit/{id}', [PenerbitController::class, 'edit'])->name('penerbit.edit');
        Route::put('/update/{id}', [PenerbitController::class, 'update'])->name('penerbit.update');
        Route::delete('/delete/{id}', [PenerbitController::class, 'destroy'])->name('penerbit.delete');
    });
    
    Route::prefix('/peminjaman')->middleware('level:2')->group(function(){
        Route::get('/', [PeminjamanController::class, 'index'])->name('peminjaman');
        Route::get('/data', [PeminjamanController::class, 'data'])->name('peminjaman.data');
        Route::get('/create/{id}', [PeminjamanController::class, 'create'])->name('peminjaman.create');
        Route::get('/member/data', [PeminjamanController::class, 'dataMember'])->name('peminjaman.member');
        Route::get('/get/{id}', [PeminjamanController::class, 'show'])->name('peminjaman.get');
        Route::post('/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    });

    Route::prefix('/pengembalian')->middleware('level:2')->group(function(){
        Route::get('/', [PengembalianController::class, 'index'])->name('pengembalian');
        Route::get('/data', [PengembalianController::class, 'data'])->name('pengembalian.data');
        Route::get('/get/{id}', [PengembalianController::class, 'show'])->name('pengembalian.get');
        Route::post('/store', [PengembalianController::class, 'store'])->name('pengembalian.store');
    });

    Route::prefix('/laporan')->middleware('level:1')->group(function(){
        Route::get('/pengembalian', [LaporanController::class, 'indexPengembalian'])->name('laporan.pengembalian');
        Route::get('/pengembalian/data', [LaporanController::class, 'dataPengembalian'])->name('laporan.pengembalian.data');
        Route::get('/peminjaman', [LaporanController::class, 'indexPeminjaman'])->name('laporan.peminjaman');
        Route::get('/peminjaman/data', [LaporanController::class, 'dataPeminjaman'])->name('laporan.peminjaman.data');
        Route::get('/anggota', [LaporanController::class, 'indexAnggota'])->name('laporan.anggota');
        Route::get('/anggota/data', [LaporanController::class, 'dataAnggota'])->name('laporan.anggota.data');
        Route::get('/buku', [LaporanController::class, 'indexBuku'])->name('laporan.buku');
        Route::get('/buku/data', [LaporanController::class, 'dataBuku'])->name('laporan.buku.data');
    });

    Route::prefix('/user')->middleware('level:1')->group(function(){
        // Route::get('/index', [DashboardController::class, 'index'])->name('kembali');
    });

    Route::post('/auth/logout', [LoginController::class, 'logout'])->name('logout');
});