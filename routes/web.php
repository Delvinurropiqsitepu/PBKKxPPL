<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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
    return view('welcome');
});
// Route::get('/coba23', function () {
//     return view('coba');
// });
Route::get('/coba', [App\Http\Controllers\CobaController::class,'index']);
Route::get('/products', [ProductController::class, 'index']);

// Route untuk menampilkan semua produk
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Route untuk menampilkan form create
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Route untuk menyimpan data produk
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::resource('products', ProductController::class);