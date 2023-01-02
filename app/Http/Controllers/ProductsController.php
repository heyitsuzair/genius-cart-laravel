<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function shop()
    {
        /**
         * Getting All Categories
         */
        $categories = Category::all();

        /**
         * Getting All Products
         */
        $products = Product::filter(request(['category', 'minimum', 'maximum']))->paginate(6)->appends(request(['category', 'minimum', 'maximum']));
        return view('shop', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}