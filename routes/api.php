<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;


Route::get('/product/get_data/{id}', [ProductController::class, 'getData']);
Route::post('/product/update_data_bulk', [ProductController::class, 'updateDataBulk'])->name('update_data_bulk');
Route::get('/utilities/parser', [ProductController::class, 'parser']);
Route::post('/product/set_data', [ProductController::class, 'setData'])->name('set_data');
Route::post('/bulk_insert', [ProductController::class, 'bulkInsert'])->name('bulk_insert');
Route::post('/seller/set_data', [SellerController::class, 'setData'])->name('seller.set_data');
Route::get('/seller/get_all', [SellerController::class, 'getAll'])->name('seller.get_all');


