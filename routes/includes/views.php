<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ViewController::class, 'home'])->name('Home');
Route::get('/contact', [ViewController::class, 'contact'])->name('Contact');
Route::get('/shop', [ProductsController::class, 'shop'])->name('Shop');
Route::get('/wishlist', [ViewController::class, 'wishlist'])->name('Wishlist');
Route::get('/cart', [ViewController::class, 'cart'])->name('Cart');
Route::get('/checkout', [ViewController::class, 'checkout'])->name('Checkout');
Route::get('/login', [ViewController::class, 'login'])->middleware('guest')->name('login');
Route::get('/dashboard', [ViewController::class, 'dashboard'])->middleware('auth')->name('Dashboard');
Route::get('/product/{product}', [ProductsController::class, 'show'])->name('Product')->where('product', '[0-9]+');