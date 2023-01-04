<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Views ------------------->
 */
Route::get('/', [ViewController::class, 'home'])->name('Home');
Route::get('/contact', [ViewController::class, 'contact'])->name('Contact');
Route::get('/shop', [ProductsController::class, 'shop'])->name('Shop');
Route::get('/wishlist', [ViewController::class, 'wishlist'])->name('Wishlist');
Route::get('/cart', [ViewController::class, 'cart'])->name('Cart');
Route::get('/product/{product}', [ProductsController::class, 'show'])->name('Product')->where('product', '[0-9]+');
/**
 * Views ------------------->
 */

/**
 * Currency ----------->
 */
Route::get('/switch-currency', [ProductsController::class, 'switchCurrency']);
/**
 * Currency ----------->
 */

/**
 * Actions ----------->
 */
Route::post('/contact', [ContactController::class, 'create']);
Route::post('/add-to-wishlist', [ProductsController::class, 'addToWishlist']);
Route::post('/product/{product}/add-review', [ProductsController::class, 'addReview']);
Route::post('/product/add-to-cart', [ProductsController::class, 'addToCart']);
Route::delete('/product/{product}/remove-from-wishlist', [ProductsController::class, 'removeFromWishlist']);
/**
 * Actions ----------->
 */