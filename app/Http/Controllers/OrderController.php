<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;

class OrderController extends Controller
{
    public function placeOrder(Request $req)
    {
        /**
         * Custom Error Messages
         */
        $custom_error_messages = [
            'name.required' => 'Name is required',
            'name.min' => 'Name Must Include Atleast Three Characters',
            'email.required' => 'Email is required',
            'email.email' => 'Please Enter A Valid Email',
            'address.required' => 'Address is required',
            'contact.required' => 'Contact is required',
            'country.required' => 'Country is required',
            'payment_method.required' => 'Payment Method is required'
        ];
        $formFields = Validator::make($req->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|string',
            'address' => 'required|string',
            'contact' => 'required|string',
            'country' => 'required|string',
            'payment_method' => 'required|string',

        ], $custom_error_messages);

        if ($formFields->fails()) {
            return redirect()->back()->with('form-failure', 'Please Resolve Errors In Form!')->withErrors($formFields)->withInput($req->all());
        }


        $cart = session()->get('cart');

        /**
         * Check If Cart Is Not Empty (for security reasons)
         */
        if (isset($cart) && count($cart) > 0) {

            $sub_total = 0;

            $products = [];

            foreach ($cart as $product_id => $value) {
                $product = Product::find($product_id);

                $sub_total += $value['quantity'] * $product->price;
                $products[] = ['product_id' => $product_id, 'quantity' => $value['quantity']];
            }

            $total = 250 + $sub_total; // 250 is delivery charges

            /**
             * Data
             */
            $fields = [
                'name' => $req->name,
                'email' => $req->email,
                'address' => $req->address,
                'contact' => $req->contact,
                'country' => $req->country,
                'payment_method' => $req->payment_method,
                'status' => 'processing',
                'total' => $total,
                'order_items' => json_encode($products),
            ];

            /**
             * Check If Payment Method is COD or CC
             */
            if ($fields['payment_method'] == 'COD') {
                /**
                 * Add Order
                 */
                $order = Order::create($fields);

                /**
                 * Destroy Sessions
                 */
                session()->put('cart', []);
                session()->put('wishlist', []);

                $last_order = Order::all()->last();


                $order_id = $last_order->id + 1;

                /**
                 * Send Mail To Customer
                 */
                $data = ['order_id' => $order_id, 'receipt_url' => null];

                $mail = Mail::send('orders.placed', $data, function ($message) use ($fields) {
                    $message->to($fields['email'], 'Genius Cart')->subject('Order Placed!');
                });

                return redirect('/')->with('form-success', 'Order Placed!');
            }

            /**
             * Custom Error Messages
             */
            $custom_error_messages_card = [
                'card_no.required' => 'Card No. Is Required',
                'card_no.min' => 'Card No. Should Be Of 16 Characters',
                'card_no.max' => 'Card No. Should Be Of 16 Characters',
                'card_no.numeric' => 'Card No. Must Be Numeric',
                'card_cvc.required' => 'Card CVC Is Required',
                'card_cvc.min' => 'Card CVC Should Be Of 3 Characters',
                'card_cvc.max' => 'Card CVC Should Be Of 3 Characters',
                'card_cvc.numeric' => 'Card CVC Must Be Numeric',
                'expiry_month.required' => 'Expiry Month Is Required',
                'expiry_month.min' => 'Expiry Month Should Be Of 2 Characters',
                'expiry_month.max' => 'Expiry Month Should Be Of 2 Characters',
                'expiry_month.numeric' => 'Expiry Month Must Be Numeric',
                'expiry_year.required' => 'Expiry Year Is Required',
                'expiry_year.min' => 'Expiry Year Should Be Of 4 Characters',
                'expiry_year.max' => 'Expiry Year Should Be Of 4 Characters',
                'expiry_year.numeric' => 'Expiry Year Must Be Numeric',
            ];

            $card_info = [
                'card_no' => $req->card_no,
                'card_cvc' => $req->card_cvc,
                'expiry_year' => $req->expiry_year,
                'expiry_month' => $req->expiry_month
            ];

            $cardFormFields = Validator::make($card_info, [
                'card_no' => 'required|min:16|max:16',
                'card_cvc' => 'required|min:3|max:3',
                'expiry_month' => 'required|min:2|max:2',
                'expiry_year' => 'required|min:4|max:4',

            ], $custom_error_messages_card);

            if ($cardFormFields->fails()) {
                return redirect()->back()->with('form-failure', 'Enter Correct Card Details!')->withErrors($cardFormFields)->withInput($req->all());
            }

            try {
                $stripe = new \Stripe\StripeClient(
                    env('STRIPE_SECRET')
                );

                /**
                 * Create Token
                 */
                $token = $stripe->tokens->create([
                    'card' => [
                        'number' => $card_info['card_no'],
                        'exp_month' => $card_info['expiry_month'],
                        'exp_year' => $card_info['expiry_year'],
                        'cvc' => $card_info['card_cvc'],
                    ],
                ]);

                $last_order = Order::all()->last();


                $order_id = $last_order->id + 1;
                /**
                 * Create Charge
                 */

                $charge = $stripe->charges->create([
                    'amount' => $total . "00",
                    'currency' => 'pkr',
                    'source' => $token->id,
                    'description' => 'Payment Of Order ID ' . $order_id,
                ]);


                /**
                 * Add Order
                 */
                $order = Order::create($fields);

                /**
                 * Destroy Sessions
                 */
                session()->put('cart', []);
                session()->put('wishlist', []);

                /**
                 * Send Mail To Customer
                 */
                $data = ['order_id' => $order_id, 'receipt_url' => $charge->receipt_url];

                $mail = Mail::send('orders.placed', $data, function ($message) use ($fields) {
                    $message->to($fields['email'], $fields['name'])->subject('Order Placed!');
                });

                /**
                 * Send Mail To Admin
                 */
                $mail_admin =  Mail::raw('New Order On Genius Cart!', function ($message) {
                    $message->to(env('MAIL_USERNAME', 'uzairdeveloper354123@gmail.com'))->subject('New Order Entry!');
                });

                return redirect('/')->with('form-success', 'Order Placed!');
            } catch (Exception $e) {
                return redirect()->back()->with('form-failure', $e->getMessage())->withErrors($cardFormFields)->withInput($req->all());
            }
        } else {
            abort('403');
        }
    }


    public function createToken($req)
    {
    }
}