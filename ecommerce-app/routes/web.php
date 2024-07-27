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
use Illuminate\Support\Facades\Auth;

// MAIN PAGE OF THE STORE
Route::get('/', function () {
    $data = \App\Models\Product::paginate(3);
    return view('user-page',compact('data'));
})->name('home');

// DASHBOARD ROUTE TO REDIRECT TO HOME OR TO ADMIN DASHBOARD DEPENDING ON USER AUTH LEVEL
// ALSO HELPS THE EMAIL VERIFICATION SYSTEM TO REDIRECT BECAUSE SOME METHODS USE Route(Home)
Route::middleware(['auth:sanctum','verified'])->get('/dashboard',function() {
    if (Auth::user()->usertype === 1) {
        return view("admin.home");
    } else if (Auth::user()->usertype === 0) {
        return redirect()->route('home');
    } 
})->name('dashboard');

// CATEGORIES
Route::middleware('auth')->group(function () {
    Route::get('/category', [AdminController::class,'viewCategory'])->name('viewCategory');
    Route::post('/addCategory',[AdminController::class,'addCategory'])->name('addCategory');
    Route::get('/deleteCategory/{id}',[AdminController::class,'deleteCategory']);
});

// PRODUCTS
Route::middleware('auth')->group(function () {
    Route::get('/products',[AdminController::class,'viewAddProducts']);
    Route::post('/addProduct',[ProductController::class,'addProduct']);
    Route::get('/showProducts',[ProductController::class,'showProducts']);
    Route::get('editProduct/{id}',[ProductController::class,'editProduct']);
    Route::post('/updateProduct/{id}',[ProductController::class,'updateProduct']);
    Route::get('/deleteProduct/{id}',[ProductController::class,'deleteProduct']);
    Route ::get('/productDetails/{id}',[ProductController::class,'getDetails']);
});


// ADMIN ORDERS
Route::middleware('auth')->group(function () {
    Route::get('/storeOrders',[OrderController::class,'storeOrders'])->name('storeOrders');
    Route::get('/updateOrder/{id}',[OrderController::class,'updateOrder'])->name('updateOrder');
    Route::post('/updateOrderStatus/{id}',[OrderController::class,'updateOrderStatus'])->name('updateOrderStatus');
    Route::get('/deleteOrder/{id}',[OrderController::class,'deleteOrder'])->name('deleteOrder');   
});

// CART 
Route::middleware('auth')->group(function () {
    Route::get('/cart',[ShoppingCartController::class,'getCartPage'])->name('getCartPage');
    Route::post('/addToCart',[ShoppingCartController::class,'addToCart'])->name('addToCart');
    Route::post('/editQuantity',[ShoppingCartController::class,'editQuantity'])->name('editQuantity');
    Route::post('/deleteProductCart',[ShoppingCartController::class,'deleteProductCart'])->name('deleteProductCart');
});

// ORDER PRODUCTS
Route::get('/orderProducts',[OrderProductsController::class,'index'])->middleware(['auth','verified'])->name('orderProducts');

// MANAGE ORDERS AND PAYMENTS
Route::middleware('auth')->group(function () {
    Route::get('/cashOrder',[OrderController::class,'cashOrder'])->name('cashOrder');
    Route::get('/cardOrder',[OrderController::class,'cardOrder'])->name('cardOrder');
});

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

//SEND MAIL ON ORDER
Route::post('/getSendMail',[AdminController::class,'getSendMail'])->middleware(['auth','verified'])->name('getSendMail');
Route::post('/sendMail',[AdminController::class,'sendMail'])->middleware(['auth','verified'])->name('sendMail');

require __DIR__.'/auth.php';
