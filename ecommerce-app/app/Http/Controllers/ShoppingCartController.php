<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\CartProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addToCart(Request $request) {
        if (Auth::user()) {
            $product_id = $request->product_id;
            $quantity = $request->quantity;
            $product = Product::find($product_id);
            if ($product) {
                $shopCartProduct = new CartProducts();
                $shopCartProduct->product_id = $product_id;
                $shopCartProduct->quantity = $quantity;
                $shopCartProduct->userid = Auth::user()->id;
                $shopCartProduct->save();
                return redirect("/cart");
            } else {
                return view("user-page");
            }
            
        } else {
            return view("login");
        }
    }

    public function getCartPage() {
        if (Auth::user()) {
            // MAKE A INNER JOIN BETWEEN PRODUCTS AND CART PRODUCTS
            $cart = DB::table('products')
            ->join('cart_products','products.id','=','cart_products.product_id')
            ->select('cart_products.product_id','products.title','products.price','products.discount_price','products.img_name','cart_products.quantity','cart_products.id')
            ->get();
            return view("shopping-cart",compact("cart"));
        } else {
            return view("login");
        }
    }
    public function editQuantity(Request $request) {
        if (Auth::user()){
            $cartProduct = CartProducts::find($request->product_id);
            if ($request->quantity >= 1) {
                $cartProduct->quantity = $request->quantity;
                $cartProduct->save();
            }
            return redirect("/cart");
        } else {
            return view("login");
        }
    }

    public function deleteProductCart(Request $request) {
        if (Auth::user()) {
            $cartProduct = CartProducts::find($request->product_id);
            $cartProduct->delete();
            return redirect('/cart');
        } else {
            return view("login");
        }
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CartProducts $cartProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartProducts $cartProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CartProducts $cartProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartProducts $cartProducts)
    {
        //
    }
}
