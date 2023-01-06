<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;


Route::delete('products/{product}', [ProductsController::class, 'destroy']);
Route::put('products/{product}', [ProductsController::class, 'update']);
Route::post('products', [ProductsController::class, 'store']);