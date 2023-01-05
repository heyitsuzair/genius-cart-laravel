<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;


Route::delete('categories/{category}', [CategoriesController::class, 'deleteCategory']);