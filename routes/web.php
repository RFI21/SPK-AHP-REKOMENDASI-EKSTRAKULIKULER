<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

use App\Http\Controllers\Admin\kriteriaController;
use App\Http\Controllers\Admin\alternatifController;
use App\Http\Controllers\Admin\perbandinganController;
use App\Http\Controllers\Admin\PerbandinganAlternatifController;
use App\Http\Controllers\userController;



    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'prosesLogin'])->name('login.proses');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // ADMIN ROUTES
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // DASHBOARD ADMIN
    Route::get('/dashboard', [AuthController::class, 'showAdminDashboard'])->name('dashboard');

    // CRUD KRITERIA
    Route::resource('kriteria', KriteriaController::class)->names('kriteria');


    // CRUD ALTERNATIF
    Route::resource('alternatif', AlternatifController::class)->names('alternatif');

    // PERBANDINGAN KRITERIA
    Route::get('/perbandingan', [PerbandinganController::class, 'index'])->name('perbandingan.index');
    Route::post('/perbandingan', [PerbandinganController::class, 'store'])->name('perbandingan.store');
    Route::post('/perbandingan', [PerbandinganController::class, 'update'])->name('perbandingan.update');
    Route::post('/perbandingan/hitung', [PerbandinganController::class, 'hitungBobot'])->name('perbandingan.hitung');

    // PERBANDINGAN ALTERNATIF
    Route::get('/perbandingan-alternatif', [PerbandinganAlternatifController::class, 'index'])->name('perbandingan-alternatif.index');
    Route::post('/perbandingan-alternatif', [PerbandinganAlternatifController::class, 'store'])->name('perbandingan-alternatif.store');
    Route::post('/perbandingan-alternatif', [PerbandinganAlternatifController::class, 'update'])->name('perbandingan-alternatif.update');
    Route::post('/perbandingan-alternatif/hitung', [PerbandinganAlternatifController::class, 'hitungBobot'])->name('perbandingan-alternatif.hitung');
});


// USER ROUTES
    Route::get('/', [AuthController::class, 'index'])->name('index');
    Route::get('/profil', [userController::class, 'profil'])->name('user.profil');
    Route::get('/ekstra', [userController::class, 'ekstra'])->name('user.ekstra');
    Route::get('/rekomendasi', [userController::class, 'form'])->name('rekomendasi.form');
    Route::post('/rekomendasi/hasil', [userController::class, 'hasil'])->name('rekomendasi.hasil');
    Route::get('/detail/{id}', [userController::class, 'show'])->name('detail.show');





