<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user-page');
});

Route::get('/dashboard', [HomeController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
