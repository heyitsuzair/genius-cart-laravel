<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::put('orders/{order}', [OrderController::class, 'update'])->middleware('auth');