<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;


Route::delete('categories/{category}', [CategoriesController::class, 'delete']);
Route::put('categories/{category}', [CategoriesController::class, 'update']);
Route::post('categories', [CategoriesController::class, 'store']);