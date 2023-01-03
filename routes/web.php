<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductsController;
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
Route::get('/', function () {
    return view('index');
})->name('Home');

Route::get('/contact', function () {
    return view('contact');
})->name('Contact');

Route::get('/shop', [ProductsController::class, 'shop'])->name('Shop');
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
Route::post('/product/{id}/add-review', [ProductsController::class, 'addReview']);
/**
 * Actions ----------->
 */