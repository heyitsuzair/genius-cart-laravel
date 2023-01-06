<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;


Route::delete('products/{product}', [ProductsController::class, 'destroy'])->middleware('auth');
Route::put('products/{product}', [ProductsController::class, 'update'])->middleware('auth');
Route::post('products', [ProductsController::class, 'store'])->middleware('auth');