<?php

use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FileDownloadController;
use App\Http\Controllers\GaleriFotoController;
use App\Http\Controllers\GaleriVideoController;
use App\Http\Controllers\IdentitasSekolahController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\TenagaPendidikController;
use App\Http\Controllers\VisiMisiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingPageController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // kategori
    Route::resource('kategori', KategoriController::class);
    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori');

    // visi misi
    Route::resource('visi_misi', VisiMisiController::class);
    Route::get('visi_misi', [VisiMisiController::class, 'index'])->name('visi_misi');

    // identitas_sekolah
    Route::resource('identitas_sekolah', IdentitasSekolahController::class);
    Route::get('identitas_sekolah', [IdentitasSekolahController::class, 'index'])->name('identitas_sekolah');

    // guru
    Route::resource('tenaga_pendidik', TenagaPendidikController::class);
    Route::get('tenaga_pendidik', [TenagaPendidikController::class, 'index'])->name('tenaga_pendidik');

    // fasilitas
    Route::resource('fasilitas', FasilitasController::class);
    Route::get('fasilitas', [FasilitasController::class, 'index'])->name('fasilitas');

    // fasilitas
    Route::resource('file_download', FileDownloadController::class);
    Route::get('file_download', [FileDownloadController::class, 'index'])->name('file_download');

    // galeri foto
    Route::resource('galeri_foto', GaleriFotoController::class);
    Route::get('galeri_foto', [GaleriFotoController::class, 'index'])->name('galeri_foto');

    // galeri video
    Route::resource('galeri_video', GaleriVideoController::class);
    Route::get('galeri_video', [GaleriVideoController::class, 'index'])->name('galeri_video');

    // dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});



require __DIR__.'/auth.php';
