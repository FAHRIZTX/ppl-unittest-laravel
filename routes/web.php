<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['tamu'])->group(function() {
    Route::get('/', function () {
        return view('login');
    })->name('login.index');
    Route::post('/login', [LoginController::class, 'login'])->name('login.process');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/chart', [MahasiswaController::class, 'chart']);
    
    Route::prefix('mahasiswa')->group(function() {
        Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
        Route::get('/search', [MahasiswaController::class, 'cari'])->name('mahasiswa.search');
        Route::get('/add', [MahasiswaController::class, 'indexTambah'])->name('mahasiswa.add');
        Route::post('/create', [MahasiswaController::class, 'store'])->name('mahasiswa.create');
        Route::get('/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
        Route::post('/update', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
        Route::get('/delete/{id}', [MahasiswaController::class, 'delete'])->name('mahasiswa.delete');
        Route::get('/pdf', [MahasiswaController::class, 'cetak_pdf'])->name('mahasiswa.pdf');
    });
    Route::get('/prodi/show', [MahasiswaController::class, 'getProdi'])->name('prodi.show'); 
});
