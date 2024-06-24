<?php

use App\Http\Controllers\FakturController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KuitansiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LaporanpertanggalController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-me', [HomeController::class, 'about']);

Route::resource('pelanggan', PelangganController::class);
Route::resource('produk', ProdukController::class);
Route::resource('faktur', FakturController::class);
Route::resource('kuitansi', KuitansiController::class);

Route::get('/entry-penjualan', [PenjualanController::class, 'entrypenjualan'])->name('entrypenjualan');
Route::post('/simpan-penjualan', [PenjualanController::class, 'simpanpesan'])->name('simpan-pesan');
Route::get('/entry-detil-pesan/{id_pesan}', [PenjualanController::class, 'entrydetilpesan'])->name('entry-detil-pesan');
Route::post('/simpan-detil', [PenjualanController::class, 'simpandetil'])->name('simpan-detil');
Route::delete('/delete-detil/{id}', [PenjualanController::class, 'deleteDetilpesan'])->name('delete-detil');

// laporan
Route::get('/laporan-tanggal', [LaporanController::class, 'tanggal'])->name('laporan-tanggal');
Route::get('/laporan-tanggal/{tanggalAwal}/{tanggalAkhir}', [LaporanController::class, 'laporanPertanggal'])->name('lap-pertanggal');

Route::get('/laporan-pelanggan', [LaporanController::class, 'pelanggan'])->name('laporan-pelanggan');
Route::get('/laporan-pelanggan/{idpelanggan}', [LaporanController::class, 'laporanPerpelanggan'])->name('lap-perpelanggan');

Route::get('/laporan-produk', [LaporanController::class, 'produk'])->name('laporan-produk');
Route::get('/laporan-produk/{idproduk}', [LaporanController::class, 'laporanPerproduk'])->name('lap-perproduk');
