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

Route::post('/contact', [ContactController::class, 'create']);