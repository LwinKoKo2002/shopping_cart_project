<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DurationController;
use App\Http\Controllers\Backend\AddToCartController;
use App\Http\Controllers\Backend\AdminUserController;

Route::prefix('admin')->name('admin.')->middleware('auth:admin_user')->group(function () {
    Route::get('/', [PageController::class,'index'])->name('home');
    Route::resource('admin-user', AdminUserController::class);
    Route::get('/admin/admin-user/datatable/ssd', [ AdminUserController::class, 'ssd'])->name('admin-user.datatable.ssd');
    Route::resource('duration', DurationController::class);
    Route::get('/admin/duration/datatable/ssd', [ DurationController::class, 'ssd'])->name('duration.datatable.ssd');
    Route::resource('city', CityController::class);
    Route::get('/admin/city/datatable/ssd', [ CityController::class, 'ssd'])->name('city.datatable.ssd');
    Route::resource('customer', CustomerController::class);
    Route::get('/admin/customer/datatable/ssd', [CustomerController::class, 'ssd'])->name('customer.datatable.ssd');
    Route::resource('category', CategoryController::class);
    Route::get('/admin/category/datatable/ssd', [CategoryController::class,'ssd'])->name('category.datatable.ssd');
    Route::resource('brand', BrandController::class);
    Route::get('/admin/brand/datatable/ssd', [BrandController::class,'ssd'])->name('brand.datatable.ssd');
    Route::resource('product', ProductController::class);
    Route::get('/admin/product/datatable/ssd', [ProductController::class,'ssd'])->name('product.datatable.ssd');
    Route::resource('add-to-cart', AddToCartController::class);
    Route::get('/admin/add-to-cart/datatable/ssd', [AddToCartController::class,'ssd'])->name('add-to-cart.datatable.ssd');
    Route::resource('order', OrderController::class);
    Route::get('/admin/order/datatable/ssd', [OrderController::class,'ssd'])->name('order.datatable.ssd');
});
