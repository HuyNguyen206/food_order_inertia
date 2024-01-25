<?php

use App\Http\Controllers\Admin\RestaurantController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => 'vendor',
    'as'         => 'vendor.',
    'middleware' => ['auth'],
], function () {
    Route::get('menu', [\App\Http\Controllers\Vendor\MenuController::class, 'index'])->name('menu');
    Route::resource('categories', \App\Http\Controllers\Vendor\CategoryController::class);
    Route::resource('products', \App\Http\Controllers\Vendor\ProductController::class);
});
