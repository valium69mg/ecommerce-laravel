<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use File;
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
                $data = Product::all();
                return view('admin.product-view',compact('data'));
            } else if ($userType === 0) { // NOT ADMIN
                return view('dashboard');
            }
        } else {
            return view('welcome');
        }
    }

    public function editProduct($id) {
        
        if (Auth::user()) {
            $userType = Auth::user()->usertype;
            if ($userType === 1) { // ADMIN
                $data = Category::all();
                $product = Product::find($id);
                return view('admin.edit-product',compact('product','data'));
            } else if ($userType === 0) { // NOT ADMIN
                return view('dashboard');
            }
        } else {
            return view('welcome');
        }
    }

    public function updateProduct(Request $request,$id) {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->discount_price = $request->discount_price;
        if ($request->hasFile('image')) {
            if (File::exists(public_path('product/'. $product->img_name))) {
                File::delete(public_path('product/'. $product->img_name));
            }
            $image = $request->image;
            $imageName = time().'.'. $image->getClientOriginalExtension();
            $request->image->move('product', $imageName);
            $product->img_name = $imageName;
        }
        $product->save();
        return redirect()->back()->with("message","Product edited succesfully");
    }

}
