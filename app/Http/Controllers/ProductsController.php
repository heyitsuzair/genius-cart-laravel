<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Models\Review;
use App\Models\Wishlist;

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
         */;
        $products = Product::filter(request(['category', 'minimum', 'maximum', 'query', 'category_id']))->paginate(6)->appends(request(['category', 'minimum', 'maximum', 'query', 'category_id']));

        for ($i = 0; $i < count($products); $i++) {
            $price = $products[$i]->price;
            $currency = Currency::convert()->from('PKR')->to(Session::get('currency') ?? 'PKR')->amount($price)->round(2)->get();
            $products[$i]->price = $currency;
        }


        return view('shop', compact(
            'categories',
            'products',
        ));
    }

    public function switchCurrency()
    {
        Session::put('currency', request('currency'));

        return back();
    }

    public function show(Request $req, Product $product)
    {
        $product_id = $product->id;
        $ip = $req->ip();

        /**
         * Currency Conversion According To Selected Currency
         */
        $product->price = Currency::convert()->from('PKR')->to(Session::get('currency') ?? 'PKR')->amount($product->price)->round(2)->get();

        /**
         * Checking If Product Is In Wishlist
         */
        $is_in_wishlist = Wishlist::where('product_id', $product_id)->where('ip', $ip)->exists();

        return view('product', compact('product', 'is_in_wishlist'));
    }

    public function addToWishlist(Request $req)
    {
        /**
         * Check If Product Is Already In Wishlist Against IP Address
         */
        $product_id = $req->product_id;
        $ip = $req->ip();

        $is_already_inlist = Wishlist::where('product_id', $product_id)->where('ip', $ip)->exists();

        /**
         * If It Is Not In Wishlist Than Adding It To Wishlist Else Returning Error
         */
        if (!$is_already_inlist) {
            Wishlist::create([
                'product_id' => $product_id,
                'ip' => $ip
            ]);
            return redirect()->back()->with('form-success', 'Product Added To Wishlist');
        }

        return redirect()->back()->with('form-failure', 'Product Already In Wishlist');
    }
    public function addReview($id, Request $req)
    {
        /**
         * Custom Error Messages
         */
        $custom_error_messages = [
            'name.required' => 'Name is required',
            'name.min' => 'Name Must Include Atleast Three Characters',
            'email.required' => 'Email is required',
            'email.email' => 'Please Enter A Valid Email',
            'message.required' => 'Message Cannot Be Empty',
            'rating.required' => 'Stars Must Be Greater Than One',
        ];
        $formFields = $req->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|string',
            'message' => 'required|string',
            'rating' => 'required|numeric|between:1,5',
        ], $custom_error_messages);

        $formFields['product_id'] = $id;

        /**
         * Adding to database
         */
        $add_review = Review::create($formFields);

        return redirect()->back()->with('form-success', 'Review Added');
    }
}