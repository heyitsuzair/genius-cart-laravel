<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::post('/contact', [ContactController::class, 'create']);
Route::post('/add-to-wishlist', [ProductsController::class, 'addToWishlist']);
Route::post('/product/{product}/add-review', [ProductsController::class, 'addReview']);
Route::post('/product/add-to-cart', [ProductsController::class, 'addToCart']);
Route::delete('/product/{product}/remove-from-wishlist', [ProductsController::class, 'removeFromWishlist']);
Route::delete('/product/{product}/remove-from-cart', [ProductsController::class, 'removeFromCart']);
Route::post('/place-order', [OrderController::class, 'placeOrder']);