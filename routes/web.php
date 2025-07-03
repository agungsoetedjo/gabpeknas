<?php

// use App\Http\Livewire\TinyMce;

use App\Http\Controllers\Public\RegulasiController;
use App\Http\Controllers\Public\AnggotaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\BeritaController;
use App\Http\Controllers\Public\GaleriController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\OrganisasiController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/news', [BeritaController::class, 'index'])->name('news.index');
Route::get('/news/{berita:slug}', [BeritaController::class, 'show'])->name('news.show');

Route::get('/tentang-kami', function () {
    return view('public.profile');
})->name('tentang-kami');

Route::get('/informasi', function () {
    return view('public.profile', ['scrollTo' => 'sejarah']);
});

Route::get('/legal', [HomeController::class, 'legalitas'])->name('legalitas');
Route::get('/pusat', [OrganisasiController::class, 'indexDPP'])->name('dpp');
Route::get('/daerah', [OrganisasiController::class, 'indexDPD'])->name('dpd');
Route::get('/syaratketentuan', [AnggotaController::class, 'syaratKetentuan'])->name('syaratketentuan');
Route::get('/anggota-bujk', [AnggotaController::class, 'indexAnggotaBUJK'])->name('anggota.bujk.index');
Route::get('/rekap-anggota', [AnggotaController::class, 'indexRekapAnggota'])->name('rekap-anggota');
Route::get('/gallery', [GaleriController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{galeri:slug}', [GaleriController::class, 'show'])->name('gallery.show');
Route::get('/regulation', [RegulasiController::class, 'index'])->name('regulation.index');
Route::get('/strukturorganisasi', [OrganisasiController::class, 'strukturorganisasi'])->name('strukturorganisasi');
Route::get('/kepengurusanpusat', [OrganisasiController::class, 'kepengurusanpusat'])->name('kepengurusanpusat');
Route::post('/kirim-pesan', [HomeController::class, 'kirimpesan'])->name('pesan.store');
Route::get('/faq', [HomeController::class, 'faqs'])->name('faq');
Route::get('/tes', function () {
    return view('public.tes');
});;

require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';