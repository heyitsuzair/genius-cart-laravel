<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Models\Review;
use App\Models\Wishlist;
use Validator;

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
        $wishlist = session()->get('wishlist', []);
        $is_in_wishlist = isset($wishlist[$product_id]) ? true : false;

        return view('product', compact('product', 'is_in_wishlist', 'related_products'));
    }

    public function addToWishlist(Request $req)
    {
        /**
         * Check If Product Is Already In Wishlist Against IP Address
         */
        $product_id = $req->product_id;
        $wishlist = session()->get('wishlist', []);

        if (isset($wishlist[$product_id])) {
            abort("403");
        }

        $wishlist[$product_id] = 1;

        session()->put('wishlist', $wishlist);

        return redirect()->back()->with('form-success', 'Product Added To Wishlist!');
    }


    public function removeFromWishlist($product)
    {
        $wishlist = session()->get('wishlist', []);

        /**
         * Check if product is in wishlist or not (for security), if not than abort 403 else remove from wishlist
         */
        if (isset($wishlist[$product])) {

            unset($wishlist[$product]);

            session()->put('wishlist', $wishlist);

            return redirect()->back()->with('form-success', 'Product Removed!');
        }


        abort("403");
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
        $formFields = Validator::make($req->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|string',
            'message' => 'required|string',
            'rating' => 'required|numeric|between:1,5',
        ], $custom_error_messages);

        if ($formFields->fails()) {
            return redirect()->back()->with('form-failure', 'Please Resolve Errors In Form!')->withErrors($formFields)->withInput($req->all());
        }

        $fields = [
            'product_id' => $product->id,
            'name' => $req->name,
            'email' => $req->email,
            'message' => $req->message,
            'rating' => $req->rating
        ];

        /**
         * Adding to database
         */
        $add_review = Review::create($fields);

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

        return redirect()->back()->with('form-success', 'Review Added!');
    }

    public function addToCart(Request $req)
    {

        /**
         * Fetching Product
         */
        $is_product_found = Product::where('id', $req->product_id)->first();

        /**
         * !Checking If Product Is Found And Found Product Quantity Is Greater Than Requested Quantity Or Not
         */
        if ($is_product_found && $is_product_found->quantity >= $req->quantity) {

            /**
             * Check If User Clicked On Buy Now Or Add To Cart
             */
            if ($req->addition_type == 'add') {
                /**
                 * Get The Session
                 */

                $cart = session()->get('cart', []);
                /**
                 * Flash Messages
                 */
                $msg = '';

                /**
                 * ? If product is already available in the cart than increment the quantity else add to cart
                 */
                if (isset($cart[$req->product_id])) {
                    $cart[$req->product_id]['quantity'] = $req->quantity;
                    session()->put('cart', $cart);
                    $msg = 'Product Updated!';
                } else {
                    $cart[$req->product_id] = [
                        'quantity' => $req->quantity,
                    ];
                    $msg = 'Product Added To Cart!';
                }

                session()->put('cart', $cart);
                return redirect()->back()->with('form-success', $msg);
            }

            $cart = [];
            $cart[$req->product_id] = [
                'quantity' => $req->quantity,
            ];
            session()->put('cart', $cart);

            return redirect('/checkout');
        } else {

            return redirect()->back()->with('form-failure', "Something Went Wrong!");
        }
    }
}