<?php

namespace App\Http\Controllers\Frontend;

use App\Models\City;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\AddToCart;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function add_to_cart(Request $request)
    {
        $product_id =$request->product_id;
        $quantity = $request->qty;
        
        if (Auth::check()) {
            if (product::where('id', $product_id)->exists()) {
                $product = Product::where('id', $product_id)->first();
                if (AddToCart::where('product_id', $product->id)->where('customer_id', auth()->id())->exists()) {
                    return response()->json([
                        'status'=>'fail',
                        'message'=>$product->model . " is already added."
                    ]);
                }
                $cart = new AddToCart();
                $cart->customer_id = auth()->id();
                $cart->product_id = $product->id;
                $cart->quantity = $quantity;
                $cart->save();
                return response()->json([
                    'status'=>'success',
                    'message'=>$product->model . " is successfully added."
                ]);
            }
        }
        return response()->json([
            'status'=>'fail',
            'message'=>'Please Login First'
        ]);
    }

    public function load_cart_count()
    {
        $cartcount = AddToCart::where('customer_id', auth()->id())->count();
        return response()->json([
            'count'=>$cartcount
        ]);
    }

    public function showCart()
    {
        $brands = Brand::all();
        $carts = AddToCart::where('customer_id', auth()->id())->get();
        return view('frontend.showCart', compact('carts', 'brands'));
    }

    public function deleteCart(Product $product)
    {
        if (Auth::check()) {
            $cart = AddToCart::where('product_id', $product->id)->where('customer_id', auth()->id())->first();
            $cart->delete();
            return response()->json([
                'status'=>'success',
                'message'=>'Successfully deleted.'
            ]);
        }
        return response()->json([
            'status'=>'fail',
            'message'=>'Please Login First'
        ]);
    }

    public function updateCart(Request $request)
    {
        $product_id = $request->product_id;
        $input_qty = $request->qty;
        if (Auth::check()) {
            if (AddToCart::where('product_id', $product_id)->where('customer_id', auth()->id())->exists()) {
                $cart = AddToCart::where('product_id', $product_id)->where('customer_id', auth()->id())->first();
                $cart->quantity = $input_qty;
                $cart->update();
                return response()->json([
                    'status'=>'success',
                    'message'=>'Successfully deleted.'
                ]);
            }
        }
        return response()->json([
            'status'=>'fail',
            'message'=>'Please Login First'
        ]);
    }

    public function checkout()
    {
        $brands = Brand::all();
        $carts = AddToCart::where('customer_id', auth()->id())->get();
        $cities = City::all();
        return view('frontend.checkout', compact('brands', 'carts', 'cities'));
    }

    public function storeCheckout(Request $request)
    {
        $request->validate(
            [
            'fname'=>'required',
            'lname'=>'required',
            'email'=>['required','email'],
            'phone'=>['required','min:9','max:11'],
            'address'=>['required'],
            'city_id'=>['required']
        ],
            [
                'fname.required'=>'please filled your first name.',
                'lname.required'=>'please filled your last name.'
            ]
        );
        $order = new Order();
        $order->customer_id = auth()->id();
        $order->fname = $request->fname;
        $order->lname = $request->lname;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->city_id = $request->city_id;
        $order->total = $request->total;
        $order->save();

        $cartItems = AddToCart::where('customer_id', auth()->id())->get();
        foreach ($cartItems as $cart) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cart->product_id;
            $orderItem->quantity = $cart->quantity;
            $orderItem->price = $cart->product->selling_price;
            $orderItem->save();

            $product = Product::where('id', $cart->product_id)->first();
            $product->quantity = $product->quantity - $cart->quantity;
            $product->update();
        }

        if (auth()->user()->address == null) {
            $user = User::where('id', auth()->id())->first();
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->city_id = $request->city_id;
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->update();
        }
        $cartItems = AddToCart::where('customer_id', auth()->id())->get();
        foreach ($cartItems as $cart) {
            $cart->delete();
        }
        return redirect()->route('home')->with(['success'=>'Successfully ordered.']);
    }
}
