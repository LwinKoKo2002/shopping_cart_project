<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Customer Auth
Auth::routes([
    'verify'=>true
]);

// Admin Auth
Route::get('/admin/login', [AdminLoginController::class,'showLoginForm']);
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminLoginController::class,'logout'])->name('admin.logout');

//Home Page
Route::get('/', [PageController::class,'index'])->name('home');
// Concern Products with Brand
Route::get('/brands/{brand}', [PageController::class,'brand']);
// Product Detail
Route::get('/products/{product}', [PageController::class,'product'])->middleware('verified');
//Contact
Route::get('/contact', [PageController::class,'contact'])->name('contact');
//Search vlues in search input
Route::get('/auto-complete', [PageController::class,'autoComplete']);
Route::get('/auto-complete-two', [PageController::class,'autoCompleteTwo']);
//Search Feature
Route::get('/brand-search', [PageController::class,'brandSearch']);
Route::get('/brand-search-two', [PageController::class,'brandSearchTwo']);
//Count for add to cart
Route::get('/load-cart-count', [PageController::class,'load_cart_count']);
//Categories Features
Route::get('/categories/{category}', [PageController::class,'category']);
//Add products to add to cart
Route::post('/add-to-cart', [PageController::class,'add_to_cart']);
//delete products from add to cart
Route::post('/delete-cart/{product}', [PageController::class,'deleteCart']);
//update quantity form add to cart
Route::post('/update-cart-quantity', [PageController::class,'updateCart']);
//products checkout
Route::post('/checkout', [PageController::class,'storeCheckout']);
//submit contact data
Route::post('/contact', [PageController::class,'storeContact'])->name('contact');
//Change Password For User Account
Route::post('/user-account/change-password', [PageController::class,'storeChangePassword'])->name('store-password');

Route::middleware(['auth', 'web'])->group(function () {
    //Add To cart
    Route::get('/add-to-cart', [PageController::class,'showCart'])->name('showCart');
    //Checkout
    Route::get('/checkout', [PageController::class,'checkout'])->name('checkout');
    //My Order
    Route::get('/my-order', [PageController::class,'myOrder'])->name('myOrder');
    //User Account
    Route::get('/user-account', [PageController::class,'myAccount'])->name('myAccount');
    Route::get('/user-account/change-password', [PageController::class,'changePassword'])->name('change-password');
});
