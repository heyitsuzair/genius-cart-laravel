<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;


Route::delete('categories/{category}', [CategoriesController::class, 'delete'])->middleware('auth');
Route::put('categories/{category}', [CategoriesController::class, 'update'])->middleware('auth');
Route::post('categories', [CategoriesController::class, 'store'])->middleware('auth');