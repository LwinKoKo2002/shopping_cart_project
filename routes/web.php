<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Customer Auth
Auth::routes();
// Admin Auth
Route::get('/admin/login', [AdminLoginController::class,'showLoginForm']);
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminLoginController::class,'logout'])->name('admin.logout');


Route::get('/', [PageController::class,'index'])->name('home');
Route::get('/brands/{brand}', [PageController::class,'brand']);
Route::get('/products/{product}', [PageController::class,'product']);
Route::get('/contact', [PageController::class,'contact'])->name('contact');
Route::post('/add-to-cart', [PageController::class,'add_to_cart']);
Route::post('/delete-cart/{product}', [PageController::class,'deleteCart']);
Route::post('/update-cart-quantity', [PageController::class,'updateCart']);
Route::post('/checkout', [PageController::class,'storeCheckout']);

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/load-cart-count', [PageController::class,'load_cart_count']);
    Route::get('/add-to-cart', [PageController::class,'showCart'])->name('showCart');
    Route::get('/checkout', [PageController::class,'checkout'])->name('checkout');
});
