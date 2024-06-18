<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\Product;
// CONTROLLER THAT SERVES THE PRODUCTS OF THE NAVBAR LINK "PRODUCTS"
class OrderProductsController extends Controller
{
    //
    public function index() {
        if (Auth::user()) {
            $data = Product::paginate(3);
            return view('all-products',compact('data'));
        } else {
            return redirect("login");
        }
    }
}
