<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function shop()
    {
        /**
         * Getting All Categories
         */
        $categories = Category::all();


        return view('shop', [
            'categories' => $categories
        ]);
    }
}