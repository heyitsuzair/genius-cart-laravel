<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Models\Category;
use App\Models\Contact;

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
                $product = Product::findOrFail($key);

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
    public function checkout()
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

        /**
         * Redirect Back If Cart Is Empty
         */
        if (count($products) < 1) {
            return redirect()->back();
        }

        return view('checkout', compact('products'));
    }

    public function login()
    {
        return view('login');
    }
    public function dashboard(Request $req)
    {
        /**
         * Check If Route Is Present In Query String Or Not
         */
        if ($req->has('route')) {
            $submissions = [];
            $categories = [];
            $categories_total_products = [];
            $products = [];
            $product = [];

            if ($req->route == 'submissions') {
                $get_submissions = Contact::all();
                $submissions = $get_submissions;
            }
            if ($req->route == 'categories') {
                $get_categories = Category::paginate(5)->appends(request(['route']));
                $categories = $get_categories;

                /**
                 * Get all categories total products available
                 */
                foreach ($get_categories as $category) {
                    $categories_total_products[$category->id] = $category->products()->count();
                }
            }

            if ($req->route == 'products') {
                $get_products = Product::paginate(5)->appends(request(['route']));
                $products = $get_products;
            }

            if ($req->route == 'products' && $req->action == 'edit') {
                /**
                 * Get Single Product
                 */
                $product_id = $req->id;
                $get_product = Product::findOrFail($product_id);
                $product = $get_product;
            }

            return view('auth.index', compact('submissions', 'categories', 'categories_total_products', 'products', 'product'));
        } else {
            return redirect('/dashboard?route=index');
        }
    }
}