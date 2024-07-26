<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
//use App\Http\Controllers\MyShopCartController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\ShoppingCartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data = \App\Models\Product::paginate(3);
    return view('user-page',compact('data'));
})->name('home');

Route::middleware(['auth:sanctum','verified'])->get('/dashboard',function() {
    return view("dashboard");
})->name('dashboard');

// CATEGORIES
Route::get('/category', [AdminController::class,'viewCategory'])->middleware(['auth', 'verified'])->name('viewCategory');

Route::post('/addCategory',[AdminController::class,'addCategory'])->middleware(['auth', 'verified'])->name('addCategory');

Route::get('/deleteCategory/{id}',[AdminController::class,'deleteCategory'])->middleware(['auth', 'verified']);

// PRODUCTS
Route::get('/products',[AdminController::class,'viewAddProducts'])->middleware(['auth', 'verified']);

Route::post('/addProduct',[ProductController::class,'addProduct'])->middleware(['auth', 'verified']);

Route::get('/showProducts',[ProductController::class,'showProducts'])->middleware(['auth','verified']);

Route::get('editProduct/{id}',[ProductController::class,'editProduct'])->middleware(['auth','verified']);

Route::post('/updateProduct/{id}',[ProductController::class,'updateProduct'])->middleware(['auth','verified']);

Route::get('/deleteProduct/{id}',[ProductController::class,'deleteProduct'])->middleware(['auth','verified']);

Route ::get('/productDetails/{id}',[ProductController::class,'getDetails']);

// ADMIN ORDERS
Route::get('/storeOrders',[OrderController::class,'storeOrders'])->middleware(['auth','verified'])->name('storeOrders');

Route::get('/updateOrder/{id}',[OrderController::class,'updateOrder'])->middleware(['auth','verified'])->name('updateOrder');

Route::post('/updateOrderStatus/{id}',[OrderController::class,'updateOrderStatus'])->middleware(['auth','verified'])->name('updateOrderStatus');

Route::get('/deleteOrder/{id}',[OrderController::class,'deleteOrder'])->middleware(['auth','verified'])->name('deleteOrder');

// CART 
Route::get('/cart',[ShoppingCartController::class,'getCartPage'])->middleware(['auth','verified'])->name('getCartPage');
Route::post('/addToCart',[ShoppingCartController::class,'addToCart'])->middleware(['auth','verified'])->name('addToCart');
Route::post('/editQuantity',[ShoppingCartController::class,'editQuantity'])->middleware(['auth','verified'])->name('editQuantity');
Route::post('/deleteProductCart',[ShoppingCartController::class,'deleteProductCart'])->middleware(['auth','verified'])->name('deleteProductCart');

// ORDER PRODUCTS
Route::get('/orderProducts',[OrderProductsController::class,'index'])->name('orderProducts');

// MANAGE ORDERS AND PAYMENTS
Route::get('/cashOrder',[OrderController::class,'cashOrder'])->middleware(['auth'],['verified'])->name('cashOrder');
Route::get('/cardOrder',[OrderController::class,'cardOrder'])->middleware(['auth'],['verified'])->name('cardOrder');

// CARD PAYMENT
Route::post('/stripePay',[StripePaymentController::class,'stripePost'])->middleware(['auth'],['verified'])->name('stripe.post');

// DISPLAY USER ORDERS
Route::get('/userOrders',[OrderProductsController::class,'userOrders'])->middleware(['auth'],['verified'])->name('userOrders');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// EMAIL VERIFICATION
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

require __DIR__.'/auth.php';
