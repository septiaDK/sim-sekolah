<?php

use App\Http\Controllers\IdentitasSekolahController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LandingPageController;
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

// dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
