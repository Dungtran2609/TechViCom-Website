<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;

Route::get('/', function () {
    $products = Product::all();
    return view('welcome', compact('products'));
});

// Router resource cho sản phẩm (CRUD)
Route::resource('products', ProductController::class);
