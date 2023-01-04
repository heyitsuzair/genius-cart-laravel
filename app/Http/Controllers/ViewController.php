<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use AmrShawky\LaravelCurrency\Facade\Currency;

class ViewController extends Controller
{
    public function home()
    {
        return view('index');
    }
    public function contact()
    {
        return view('contact');
    }
    public function wishlist()
    {
        $products = [];

        $wishlists = session()->get('wishlist', []);

        /**
         * Check If Session Is Not Empty
         */
        if (isset($wishlists)) {

            foreach ($wishlists as $key => $value) {
                $product = Product::find($key);
                /**
                 * Currency Conversion According To Selected Currency
                 */
                $product->price = Currency::convert()->from('PKR')->to(Session::get('currency') ?? 'PKR')->amount($product->price)->round(2)->get();
                $products[] = $product;
            }
        }


        return view('wishlist', compact('products'));
    }
}