<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

// LOGIN
Route::get('/login', [AuthController::class, 'form']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);


// SISWA
Route::get('/siswa/form', [AspirasiController::class, 'index']);
Route::post('/siswa/kirim', [AspirasiController::class, 'store']);
Route::get('/siswa/histori', [AspirasiController::class, 'histori']);


// ADMIN
Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::post('/admin/feedback/{id}', [FeedbackController::class, 'store']);
Route::get('/admin/aspirasi/delete/{id}', [AdminController::class,'destroy']);

Route::get('/admin/user', [UserController::class, 'index']);
Route::post('/admin/user', [UserController::class, 'store']);
Route::get('/admin/user/delete/{id}', [UserController::class, 'destroy']);

Route::post('/admin/kategori', [KategoriController::class, 'index']);
Route::get('/admin/kategori', [KategoriController::class, 'index']);
Route::post('/admin/kategori', [KategoriController::class, 'store']);
Route::get('/admin/kategori/delete/{id}', [KategoriController::class, 'destroy']);