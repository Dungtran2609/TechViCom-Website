<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\Product\BrandController;
use App\Http\Controllers\Admin\OrderController;



// Chuyển hướng trang chủ vào dashboard
Route::get('/', function () {
    return view('admin.dashboard');
});

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Categories routes
    Route::get('products/categories/trashed', [CategoryController::class, 'trashed'])->name('products.categories.trashed');
    Route::post('products/categories/{id}/restore', [CategoryController::class, 'restore'])->name('products.categories.restore');
    Route::delete('products/categories/{id}/force-delete', [CategoryController::class, 'forceDelete'])->name('products.categories.force-delete');
    Route::resource('products/categories', CategoryController::class)->names('products.categories');
    ;
    // Brands routes
    Route::get('products/brands/trashed', [BrandController::class, 'trashed'])->name('products.brands.trashed');
    Route::post('products/brands/{id}/restore', [BrandController::class, 'restore'])->name('products.brands.restore');
    Route::delete('products/brands/{id}/force-delete', [BrandController::class, 'forceDelete'])->name('products.brands.force-delete');
    Route::resource('products/brands', BrandController::class)->names('products.brands');
    //Order
    Route::get('order/trashed', [OrderController::class, 'trashed'])->name('order.trashed');
    Route::post('order/{id}/restore', [OrderController::class, 'restore'])->name('order.restore');
    Route::delete('order/{id}/force-delete', [OrderController::class, 'forceDelete'])->name('order.force-delete');
    Route::resource('order', OrderController::class)->names('order');
});
