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
        $user = Auth::user();
        if ($user->usertype === 1) { // IF USER IS ADMIN
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
        // NOT ADMIN
        return redirect()->route('home');
    }

    public function showProducts(Request $request) {
        $userType = Auth::user()->usertype;
        if ($userType === 1) { // ADMIN
            $data = Product::all();
            return view('admin.product-view',compact('data'));
        } 
        // NOT ADMIN
        return redirect()->route('home');
        
    }

    public function editProduct($id) {
        $userType = Auth::user()->usertype;
        if ($userType === 1) { // ADMIN
            $data = Category::all();
            $product = Product::find($id);
            return view('admin.edit-product',compact('product','data'));
        }
        // NOT ADMIN
        return redirect()->route('home');
    }

    public function updateProduct(Request $request,$id) { 
        if (Auth::user()->usertype === 1) {
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
        // NOT ADMIN
        return redirect()->route('home');
    }

    public function deleteProduct($id) {
        if (Auth::user()->usertype === 1) {
            $product = Product::find($id);
            $product->delete();
            return redirect()->back()->with("message","Product deleted succesfully");
        }
        // NOT ADMIN
        return redirect()->route('home');
    }

    public function getDetails($id) { 
        if (Auth::user()->usertype === 1) {
            $product = Product::find($id);
            return view("products.product-details", compact("product"));
        }
        // NOT ADMIN
        return redirect()->route('home');
    }

}
