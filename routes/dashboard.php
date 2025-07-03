<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\BeritaController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\GaleriController;
use App\Http\Controllers\Dashboard\KategoriController;
use App\Http\Controllers\Dashboard\PesanController;
use App\Http\Controllers\Dashboard\RegulasiController;
use App\Http\Controllers\Dashboard\RegulasiKategoriController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\UserController;

Route::middleware(['auth'])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::patch('/berita/{berita}/publish', [BeritaController::class, 'publish'])->name('berita.publish');

        Route::resource('/berita', BeritaController::class)->parameters([
            'berita' => 'berita',
        ]);;

        Route::patch('/galeri/{galeri}/publish', [GaleriController::class, 'publish'])->name('galeri.publish');

        Route::resource('/galeri', GaleriController::class)->parameters([
            'galeri' => 'galeri',
        ]);

        Route::resource('/kategori', KategoriController::class);
        Route::resource('/users', UserController::class);

        Route::patch('/sliders/{slider}/publish', [SliderController::class, 'publish'])->name('sliders.publish');
        Route::resource('/sliders', SliderController::class);

        Route::resource('/regulasi', RegulasiController::class)->parameters([
            'regulasi' => 'regulasi',
        ]);;

        Route::resource('/regulasi-kategori', RegulasiKategoriController::class)->parameters([
            'regulasi-kategori' => 'kategori',
        ]);

        Route::resource('/pesan', PesanController::class)->only(['index', 'show', 'destroy']);

    });