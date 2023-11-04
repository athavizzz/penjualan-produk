<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\supplierController;
use App\Http\Controllers\pembelianController;   
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\CetakPembelianController;
use App\Http\Controllers\CetakPenjualanController;



Route::get('/', [CustomAuthController::class, 'home']); 
Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('postlogin', [CustomAuthController::class, 'login'])->name('postlogin'); 
Route::post('postsignup', [CustomAuthController::class, 'signupsave'])->name('postsignup'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
// Route::get('penjualan', [CustomAuthController::class, 'penjualan'])->name('penjualan');
Route::get('stok', [CustomAuthController::class, 'stok'])->name('stok');
Route::get('add', [CustomAuthController::class, 'add'])->name('add');
Route::resource('produk', ProdukController::class)->except('show');
Route::resource('suplier', supplierController::class)->except('show');
Route::resource('pembelian', pembelianController::class)->except('show');
Route::resource('penjualan', PenjualanController::class);
Route::get('cetak-pembelian', [CetakPembelianController::class, 'index'])->name('cetak-pembelian.index');
Route::get('cetak-penjualan', [CetakPenjualanController::class, 'index'])->name('cetak-penjualan.index');
Route::get('cetak-penjualan-pdf', [CetakPenjualanController::class, 'print'])->name('cetak-penjualan.print');
Route::get('cetak-pembelian-pdf', [CetakPembelianController::class, 'print'])->name('cetak-pemebelian.print');
Route::get('/getHargaBeli',  [PenjualanController::class, 'getHargaBeli']);



