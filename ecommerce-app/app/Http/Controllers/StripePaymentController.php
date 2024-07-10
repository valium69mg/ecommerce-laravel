<?php

    

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Session;

use Stripe;

     

class StripePaymentController extends Controller

{

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */
    

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripePost(Request $request)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        Stripe\Charge::create ([

                "amount" => $request->amount,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment from ecommerce-laravel.com." 

        ]);      
  
        Session::flash('success', 'Payment successful!');
        // DELETE ORDER TABLE FROM USER AFTER PAYING ALL THE CART
        
        return back();

    }

}