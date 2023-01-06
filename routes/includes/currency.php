<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/switch-currency', [ProductsController::class, 'switchCurrency']);