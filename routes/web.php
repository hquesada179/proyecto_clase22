<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::prefix('/cart')->controller(CartController::class)->group(function () {
    Route::get('/',                  'index' )->name('cart.index');
    Route::post('/add/{product}',    'add'   )->name('cart.add');
    Route::delete('/remove/{cartItem}', 'remove')->name('cart.remove');
    Route::delete('/clear',          'clear' )->name('cart.clear');
});

Route::prefix('/category')->controller(CategoryController::class)->group(function () {
    Route::get('/',                'index'  )->name('category.index');
    Route::get('/create',          'create' )->name('category.create');
    Route::post('/',               'store'  )->name('category.store');
    Route::get('/{category}/edit', 'edit'   )->name('category.edit');
    Route::put('/{category}',      'update' )->name('category.update');
    Route::delete('/{category}',   'destroy')->name('category.destroy');
});

Route::prefix('/product')->controller(ProductController::class)->group(function () {

    Route::get('/', 'index')->name('product.index');
    Route::get('/create', 'create')->name('product.create');
    Route::post('/', 'store')->name('product.store');

    // específica primero para evitar que /{id}/{categoria?} la absorba
    Route::get('/{id}/image', 'imageOnly')->name('product.image');

    Route::get('/{id}/{categoria?}', 'show')->name('product.show');
    Route::delete('/{product}', 'destroy')->name('product.destroy');
});