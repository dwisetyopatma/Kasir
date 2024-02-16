<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\ProdukController;

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

Route::get('/', function () {
    return view('landing');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::resource('pelanggan', PelangganController::class);
    Route::resource('pelanggan', PelangganController::class)->names('pelanggan');
    // Route::get('/pelanggan/{id}/edit', 'PelangganController@edit')->name('pelanggan.edit');
    Route::delete('/pelanggan/{id}', 'PelangganController@destroy')->name('pelanggan.destroy');
    Route::delete('/pelanggan/{id}', 'PelangganController@destroy')->name('pelanggan.destroy');

    Route::resource('penjualan', PenjualanController::class)->names('penjualan');
    // Route::get('/penjualan/{id}/edit', 'PenjualanController@edit')->name('penjualan.edit');
    Route::delete('/penjualan/{id}', 'PenjualanController@destroy')->name('penjualan.destroy');
    Route::delete('/penjualan/{id}', 'PenjualanController@destroy')->name('penjualan.destroy');

    Route::resource('detailpenjualan', DetailPenjualanController::class)->names('detailpenjualan');
    // Route::get('/detailpenjualan/{id}/edit', 'DetailPenjualanController@edit')->name('detailpenjualan.edit');
    // Route::delete('/detailpenjualan/{id}', 'DetailPenjualanController@destroy')->name('detailpenjualan.destroy');
    // Route::delete('/detailpenjualan/{id}', 'DetailPenjualanController@destroy')->name('detailpenjualan.destroy');

    Route::resource('produks', ProdukController::class)->names('produk');






});

require __DIR__.'/auth.php';
