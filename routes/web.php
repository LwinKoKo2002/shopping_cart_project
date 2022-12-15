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


Route::get('/', [PageController::class,'index'])->name('home');
Route::get('/brands/{brand}', [PageController::class,'brand'])->middleware('verified');
Route::get('/products/{product}', [PageController::class,'product']);
Route::get('/contact', [PageController::class,'contact'])->name('contact');
Route::get('/auto-complete', [PageController::class,'autoComplete']);
Route::get('/brand-search', [PageController::class,'brandSearch']);
Route::get('/load-cart-count', [PageController::class,'load_cart_count']);
Route::post('/add-to-cart', [PageController::class,'add_to_cart']);
Route::post('/delete-cart/{product}', [PageController::class,'deleteCart']);
Route::post('/update-cart-quantity', [PageController::class,'updateCart']);
Route::post('/checkout', [PageController::class,'storeCheckout']);
Route::post('/contact', [PageController::class,'storeContact'])->name('contact');

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/add-to-cart', [PageController::class,'showCart'])->name('showCart');
    Route::get('/checkout', [PageController::class,'checkout'])->name('checkout');
    Route::get('/my-order', [PageController::class,'myOrder'])->name('myOrder');
    Route::get('/user-account', [PageController::class,'myAccount'])->name('myAccount');
    Route::get('/user-account/change-password', [PageController::class,'changePassword'])->name('change-password');
});
