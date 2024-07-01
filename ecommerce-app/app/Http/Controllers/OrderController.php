<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartProducts;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //

    public function cashOrder () {
        if (Auth::user()) {
            $user = Auth::user();
            // USER
            $user_name = $user->name;
            $user_email = $user->email;
            $user_phone = $user->phone;
            $user_address = $user->address;
            $user_id = $user->id;
            // CART
            $myCartProducts = CartProducts::where("userid",'=',$user_id)->get();
            if (count($myCartProducts) < 1) {
                return redirect('/');
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
                $order->payment_status = "pending";
                $order->payment_method = "cash";
                $order->delivery_status = "pending";
                $order->save();
                $product->delete();
            }
            return redirect('/');
        } else {
            return redirect('login');
        }
    }
}
