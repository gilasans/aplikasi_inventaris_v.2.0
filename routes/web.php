<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Models\Kategori;
use App\Http\Controllers\BarangmasukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangkeluarController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\PinjemController;
use App\Models\Supplier;

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

Route::get('/', [KategoriController::class, 'welcome']);


// Route::get('/user', function () {
//     return "Anda USER Aplikasi";
// })->middleware('auth')->name('user');
// 

// // jalur redirect kalau usernya role admin
// Route::get('/admin', function () {
//     return "Selamat Datang, ADMINISTRATOR";
// })->middleware('auth')->name(('admin'));

// DISESUAIKAN AJA ROLENYA MASEH
Route::get('/dashboard', [KategoriController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');    



Route::middleware(['auth','role:admin'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/home', [BarangController::class, 'count'])->name('home');

    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/barang', [BarangController::class, 'index'])->name('barang');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/destroy/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
    Route::get('/barang/show/{id}', [BarangController::class, 'show'])->name('barang.show');
    Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');


    Route::get('/barangmasuk', [BarangmasukController::class, 'index'])->name('barangmasuk.index');
    Route::get('/barangmasuk/create', [BarangmasukController::class, 'create'])->name('barangmasuk.create');
    Route::post('/barangmasuk/store', [BarangmasukController::class, 'store'])->name('barangmasuk.store');
    Route::get('/barangmasuk/destroy/{id}', [BarangmasukController::class, 'destroy'])->name('barangmasuk.destroy');
    Route::get('/barangmasuk/show/{id}', [BarangmasukController::class, 'show'])->name('barangmasuk.show');
    Route::get('/barangmasuk/edit/{id}', [BarangmasukController::class, 'edit'])->name('barangmasuk.edit');
    Route::put('/barangmasuk/update/{id}', [BarangmasukController::class, 'update'])->name('barangmasuk.update');

    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/supplier/destroy/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
    Route::get('/supplier/show/{id}', [SupplierController::class, 'show'])->name('supplier.show');
    Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.ediusert');
    Route::put('/supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');

    Route::get('/stok', [BarangmasukController::class, 'stok'])->name('stok');

    Route::get('/barangkeluar', [BarangkeluarController::class, 'index'])->name('barangkeluar');
    Route::get('/barangkeluar/create', [BarangkeluarController::class, 'create'])->name('barangkeluar.create');
    Route::post('/barangkeluar/store', [BarangkeluarController::class, 'store'])->name('barangkeluar.store');
    Route::get('/barangkeluar/destroy/{id}', [BarangkeluarController::class, 'destroy'])->name('barangkeluar.destroy');
    Route::get('/barangkeluar/show/{id}', [BarangkeluarController::class, 'show'])->name('barangkeluar.show');
    Route::get('/barangkeluar/edit/{id}', [BarangkeluarController::class, 'edit'])->name('barangkeluar.edit');
    Route::put('/barangkeluar/update/{id}', [BarangkeluarController::class, 'update'])->name('barangkeluar.update');

    Route::get('/pinjambarang', [PinjemController::class, 'index'])->name('pinjem.index');
    Route::get('/pinjambarang/create', [PinjemController::class, 'create'])->name('pinjem.create');
    Route::post('/pinjambarang/store', [PinjemController::class, 'store'])->name('pinjem.store');
    Route::get('/pinjambarang/destroy/{id}', [PinjemController::class, 'destroy'])->name('pinjem.destroy');
    Route::get('/pinjambarang/show/{id}', [PinjemController::class, 'show'])->name('pinjem.show');
    Route::get('/pinjambarang/edit/{id}', [PinjemController::class, 'edit'])->name('pinjem.edit');
    Route::put('/pinjambarang/update/{id}', [PinjemController::class, 'update'])->name('pinjem.update');

});

Route::middleware(['auth','role:user'])->group(function () {
    // Route::get('/dashboard', [KategoriController::class, 'dashboard'])->name('dashboard');
    Route::get('/pinjam', [PinjamController::class, 'history'])->name('pinjam');
    Route::get('/pinjam/create', [PinjamController::class, 'create'])->name('pinjam.create');
    Route::post('/pinjam/store', [PinjamController::class, 'store'])->name('pinjam.store');
    Route::get('/pinjam/edit/{id}', [PinjamController::class, 'edit'])->name('pinjam.edit');
    Route::get('/pinjam/update/{id}', [PinjamController::class, 'update'])->name('pinjam.update');
    Route::get('/pinjam/destroy /{id}', [PinjamController::class, 'destroy'])->name('pinjam.destroy');

});

// Route::get('/', function () {
//     return view('welcome');
// });









require __DIR__ . '/auth.php';
