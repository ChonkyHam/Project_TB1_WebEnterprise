<?php

use App\Http\Controllers\ContohController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get ('/index', [ContohController::class, 'TampilContoh']);

// Route::get ('/produk', [ProdukController::class, 'ViewProduk']);

// Route::get ('/produk/add', [ProdukController::class, 'ViewAddProduk']);

// Route::post('/add', [ProdukController::class, 'CreateProduk']);

// Route::delete('/produk/delete/{kode_produk}', [ProdukController::class, 'DeleteProduk']);

// Route::get('/produk/edit/{kode_produk}', [ProdukController::class, 'ViewEditProduk']);

// Route::put('/produk/edit/{kode_produk}', [ProdukController::class, 'UpdateProduk']);

// Route::get('/laporan', action: [ProdukController::class, 'ViewLaporan']);

// Route::get('/report', action: [ProdukController::class, 'print']);

// Route::get('/index', [ContohController::class, 'ViewHome']);

Route::get('/login', [AuthController::class, 'showLogInForm']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm']);

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);


Route::middleware(['auth', 'user-access-user'])->prefix('user')->group(function(){

    Route::get('/index', [ContohController::class, 'ViewHome']);

    Route::get('/produk', [ProdukController::class, 'ViewProduk']);

    Route::get('/produk/add', [ProdukController::class, 'ViewAddProduk']);

    Route::post('/produk/add', [ProdukController::class, 'CreateProduk']);


    Route::delete('/produk/delete/{kode_produk}', [ProdukController::class, 'DeleteProduk']);

    Route::get('/produk/edit/{kode_produk}', [ProdukController::class, 'ViewEditProduk']);

    Route::put('/produk/edit/{kode_produk}', [ProdukController::class, 'UpdateProduk']);

    Route::get('/report', action: [ProdukController::class, 'print']);

    Route::get('/laporan', action: [ProdukController::class, 'ViewLaporan']);





});
