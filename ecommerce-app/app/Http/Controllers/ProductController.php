<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    public function addProduct(Request $request){
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->discount_price = $request->discount_price;
        $image = $request->image;
        $imageName = time().'.'. $image->getClientOriginalExtension();
        $request->image->move('product', $imageName);
        $product->img_name = $imageName;
        $product->save();
        return redirect()->back()->with("message","Product created succesfully");
    }

    public function showProducts(Request $request) {
        if (Auth::user()) {
            $userType = Auth::user()->usertype;
            if ($userType === 1) { // ADMIN
                return view('admin.product-view');
            } else if ($userType === 0) { // NOT ADMIN
                return view('dashboard');
            }
        } else {
            return view('welcome');
        }
    }

}
