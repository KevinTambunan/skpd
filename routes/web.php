<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/', [App\Http\Controllers\PagesController::class, 'dashboard']);
Route::get('/register_verifikator', [App\Http\Controllers\PagesController::class, 'register_verifiaktor']);
Route::get('/list', [App\Http\Controllers\PagesController::class, 'listHomestay']);
Route::get('/home', [App\Http\Controllers\PagesController::class, 'home']);


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/tambah_user', [App\Http\Controllers\PagesController::class, 'tambah_user']);
    Route::post('/create_user', [App\Http\Controllers\PagesController::class, 'create_user']);
});

Route::middleware(['auth', 'verifikator'])->group(function () {
    // Route::post('/bank/destroy/{id}', [App\Http\Controllers\BankController::class, 'destroy']);
});

Route::middleware(['auth', 'user'])->group(function () {

    // aplikasi
    Route::get('/aplikasi', [App\Http\Controllers\AplikasiController::class, 'index']);
    Route::get('/tambah_aplikasi', [App\Http\Controllers\AplikasiController::class, 'create']);
    Route::post('/create_aplikasi', [App\Http\Controllers\AplikasiController::class, 'store']);

});
