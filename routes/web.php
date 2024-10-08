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

