<?php

    

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Session;

use Stripe;

use App\Models\CartProducts;
use App\Models\Product;

     

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
  
        // DELETE ORDER TABLE FROM USER AFTER PAYING ALL THE CART
        // USER
        $user = Auth::user();
        $user_name = $user->name;
        $user_email = $user->email;
        $user_phone = $user->phone;
        $user_address = $user->address;
        $user_id = $user->id;
        $user_id = $user->id;

        // CART
        $myCartProducts = CartProducts::where("userid",'=',$user_id)->get();
        if (count($myCartProducts) < 1) {
            return response()->redirect('/');
        }
        foreach ($myCartProducts as $product) {
            $order = new Order();                
            $productDetails = Product::where("id","=",$product->product_id)->get();
            if (count($productDetails) != 1) {
                continue;
            }
            $order->name = $user_name;
            $order->email = $user_email;
            $order->phone = $user_phone;
            $order->address = $user_address;
            $order->userid = $user_id;
            $order->product_title = $productDetails[0]->title;
            $order->product_quantity = $product->quantity;
            $order->product_price = $productDetails[0]->price;
            $order->product_image = $productDetails[0]->img_name;
            $order->payment_status = "completed";
            $order->payment_method = "card";
            $order->delivery_status = "pending";
            // SAVE ITEM ON ORDER
            $order->save();
            // DELETE PRODUCT FROM CART
            $product->delete();
        }

        

        Session::flash('success', 'Payment successful!');

        return redirect()->back();

    }

}