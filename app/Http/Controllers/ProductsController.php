<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use AmrShawky\LaravelCurrency\Facade\Currency;

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

        for ($i = 0; $i < count($products); $i++) {
            $price = $products[$i]->price;
            $currency = Currency::convert()->from('PKR')->to(Session::get('currency') ?? 'PKR')->amount($price)->round(2)->get();
            $products[$i]->price = $currency;
        }

        return view('shop', [
            'categories' => $categories,
            'products' => $products,
            'currency' => $currency,
        ]);
    }

    public function switchCurrency()
    {
        Session::put('currency', request('currency'));

        return back();
    }
}