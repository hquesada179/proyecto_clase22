<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::prefix('/product')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('product.index');
    Route::get('/create', 'create')->name('product.create');
    Route::post('/', 'store')->name('product.store'); // ✅ NUEVA
    Route::get('/{id}/{categoria?}', 'show')->name('product.show'); // ✅ categoria opcional
});