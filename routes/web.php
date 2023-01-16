<?php

use App\Http\Controllers\Admin\AdminBarangController;
use App\Http\Controllers\Admin\AdminKategoriController;
use App\Http\Controllers\Admin\AdminMerkController;
use App\Http\Controllers\Admin\AdminSupplierController;
use App\Http\Controllers\Admin\AdminTransaksiController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\BarangController;
use App\Http\Controllers\user\TransaksiController;
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

Route::get('/sf', function(){
    session()->flush();
    return redirect()->route('login');
});

Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth', 'auth.admin'])->prefix('admin')->as('admin.')->group(function(){
    Route::get('/', [AdminHomeController::class, 'index'])->name('home');
    
    Route::resource('/transaksi', AdminTransaksiController::class);
    Route::resource('/user', AdminUserController::class);
    Route::resource('/supplier', AdminSupplierController::class);

    Route::resource('/kategori', AdminKategoriController::class);
    Route::resource('/merk', AdminMerkController::class);
    Route::resource('/barang', AdminBarangController::class);

    Route::prefix('setting')->group(function(){
        
    });
});

Route::middleware(['auth', 'auth.user'])->as('user.')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/search-data-barang', [TransaksiController::class, 'searchDataBarang'])->name('transaksi.search_data_barang');
    
    Route::resource('/barang', BarangController::class);
    Route::resource('/transaksi', TransaksiController::class);
    Route::resource('/user', BarangController::class);
});
