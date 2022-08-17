<?php

use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FileDownloadController;
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

// kategori
Route::resource('kategori', KategoriController::class)->middleware(['auth']);
Route::get('kategori', [KategoriController::class, 'index'])->middleware(['auth'])->name('kategori');

// visi misi
Route::resource('visi_misi', VisiMisiController::class)->middleware(['auth']);
Route::get('visi_misi', [VisiMisiController::class, 'index'])->middleware(['auth'])->name('visi_misi');

// identitas_sekolah
Route::resource('identitas_sekolah', IdentitasSekolahController::class)->middleware(['auth']);
Route::get('identitas_sekolah', [IdentitasSekolahController::class, 'index'])->middleware(['auth'])->name('identitas_sekolah');

// guru
Route::resource('tenaga_pendidik', TenagaPendidikController::class)->middleware(['auth']);
Route::get('tenaga_pendidik', [TenagaPendidikController::class, 'index'])->middleware(['auth'])->name('tenaga_pendidik');

// fasilitas
Route::resource('fasilitas', FasilitasController::class)->middleware(['auth']);
Route::get('fasilitas', [FasilitasController::class, 'index'])->middleware(['auth'])->name('fasilitas');

// fasilitas
Route::resource('file_download', FileDownloadController::class)->middleware(['auth']);
Route::get('file_download', [FileDownloadController::class, 'index'])->middleware(['auth'])->name('file_download');

// dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
