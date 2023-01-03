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
         * Get Related Products
         */
        $related_products = Product::where('category_id', $product->category_id)->whereNotIn('id', [$product->id])->get();

        /**
         * Checking If Product Is In Wishlist
         */
        $is_in_wishlist = Wishlist::where('product_id', $product_id)->where('ip', $ip)->exists();

        return view('product', compact('product', 'is_in_wishlist', 'related_products'));
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
    public function addReview(Product $product, Request $req)
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

        $formFields['product_id'] = $product->id;

        /**
         * Adding to database
         */
        $add_review = Review::create($formFields);

        /**
         * Count One Stars In Database Against Product ID
         */
        $one_star = Review::where('product_id', $product->id)->where('rating', '1')->count();
        /**
         * Count Two Stars In Database Against Product ID
         */
        $two_star = Review::where('product_id', $product->id)->where('rating', '2')->count();
        /**
         * Count Three Stars In Database Against Product ID
         */
        $three_star = Review::where('product_id', $product->id)->where('rating', '3')->count();
        /**
         * Count Four Stars In Database Against Product ID
         */
        $four_star = Review::where('product_id', $product->id)->where('rating', '4')->count();
        /**
         * Count Five Stars In Database Against Product ID
         */
        $five_star = Review::where('product_id', $product->id)->where('rating', '5')->count();

        /**
         * Product Average Rating
         */
        $average_rating =
            (5 * $five_star +
                4 * $four_star +
                3 * $three_star +
                2 * $two_star +
                1 * $one_star) /
            ($five_star + $four_star + $three_star + $two_star + $one_star);

        /**
         * Updating Product Average Rating And Total Reviews By Adding One To The Current Product Total Reviews
         */
        $product->update(['average_rating' => $average_rating, 'total_reviews' => $product->total_reviews + 1]);

        return redirect()->back()->with('form-success', 'Review Added');
    }
}