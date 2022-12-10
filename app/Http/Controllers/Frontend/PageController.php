<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $products = Product::all();
        return view('frontend.home', [
            'brands'=>$brands,
            'products'=>$products
        ]);
    }

    public function brand(Brand $brand)
    {
        $brands = Brand::all();
        return view('frontend.brand', [
            'brands'=>$brands,
            'brand'=>$brand
        ]);
    }

    public function product(Product $product)
    {
        $brands = Brand::all();
        return view('frontend.product', [
            'brands'=>$brands,
            'product'=>$product
        ]);
    }
}
