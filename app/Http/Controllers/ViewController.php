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

    public function cart()
    {

        $cart = session()->get('cart', []);

        $products = [];

        /**
         * Check If Cart Is Set And Is Not Empty
         */
        if (isset($cart) && count($cart) > 0) {

            /**
             * Iterate through cart and find each product against its id which is key of cart array
             */

            foreach ($cart as $key => $value) {
                $product = Product::find($key);
                /**
                 * Currency Conversion According To Selected Currency
                 */
                $product->price = Currency::convert()->from('PKR')->to(Session::get('currency') ?? 'PKR')->amount($product->price)->round(2)->get();

                /**
                 * Pushing Requested Quantity To Product Array
                 */
                $product->requested_quantity = $value['quantity'];
                /**
                 * Push To Products Array
                 */
                $products[] = $product;
            }
        }

        return view('cart', compact('products'));
    }
}