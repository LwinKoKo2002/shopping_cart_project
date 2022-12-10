<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('/', [PageController::class,'index'])->name('home');
Route::get('/brands/{brand}', [PageController::class,'brand']);
Route::get('/products/{product}', [PageController::class,'product']);

Route::get('/admin/login', [AdminLoginController::class,'showLoginForm']);
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminLoginController::class,'logout'])->name('admin.logout');
