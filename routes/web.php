<?php

use App\Http\Controllers\ContohController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/index', function () {
//     return view('index');
// });

Route::get ('/index', [ContohController::class, 'TampilContoh']);

Route::get ('/produk', [ProdukController::class, 'ViewProduk']);
Route::get ('/produk/add', [ProdukController::class, 'ViewAddProduk']);

Route::delete('/produk/delete/{kode_produk}', [ProdukController::class, 'DeleteProduk']);
Route::post('/add', [ProdukController::class, 'CreateProduk']);



