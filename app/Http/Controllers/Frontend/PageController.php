<?php

namespace App\Http\Controllers\Frontend;

use App\Models\City;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use App\Models\AddToCart;
use App\Models\OrderItem;
use App\Mail\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $brands = Brand::all();
        return view('frontend.home', [
            'products'=>$products,
            'brands'=>$brands
        ]);
    }

    public function brand(Brand $brand)
    {
        return view('frontend.brand', [
            'brand'=>$brand
        ]);
    }

    public function product(Product $product)
    {
        return view('frontend.product', [
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
        $carts = AddToCart::where('customer_id', auth()->id())->get();
        return view('frontend.showCart', compact('carts'));
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
        $carts = AddToCart::where('customer_id', auth()->id())->get();
        $cities = City::all();
        return view('frontend.checkout', compact('carts', 'cities'));
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
        Mail::to(auth()->user()->email)->send(new ProductOrder($order));
        return redirect()->route('home')->with(['success'=>'Successfully ordered.']);
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function autoComplete()
    {
        $brands = Brand::all();
        $data = [];
        foreach ($brands as $brand) {
            $data[] = $brand->name;
        }
        return $data;
    }

    public function brandSearch()
    {
        $brand_search = request()->brand_search;
        $brand = Brand::where('name', 'like', '%'.$brand_search .'%')->first();
        return response()->json([
            'status'=>'success',
            'brand_id'=>$brand->id
        ]);
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email'=>['required',Rule::unique('contacts', 'email')],
            'phone'=>['required','min:9','max:11',Rule::unique('contacts', 'phone')],
            'message'=>['required']
        ]);

        $contact = new Contact();
        $contact->username = $request->fname ." " .$request->lname;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        $mail_data=[
            'shopping_cart'=>'lwinkoko0271@gmail.com',
            'fromEmail'=>$contact->email,
            'fromUser'=>$contact->username,
            'subject'=>'Contact Email',
            'body'=>$contact->message,
        ];
        Mail::send('frontend.mail.contact_mail', $mail_data, function ($message) use ($mail_data) {
            $message->to($mail_data['shopping_cart'])
                    ->from($mail_data['fromEmail'], $mail_data['fromUser'])
                    ->subject($mail_data['subject']);
        });
        return redirect()->route('home')->with(['success'=>'Successfully send.']);
    }

    public function myOrder()
    {
        $orders = Order::where('customer_id', auth()->id())->get();
        return view('frontend.myOrder', compact('orders'));
    }

    public function myAccount()
    {
        return view('frontend.myAccount');
    }

    public function changePassword()
    {
        return view('frontend.changePassword');
    }

    public function storeChangePassword(Request $request)
    {
        $request->validate([
            'current_password'=>'required',
            'new_password'=>['required','string', 'min:8']
        ]);
        $user = User::where('id', auth()->id())->first();
        if (Hash::check($request->current_password, $user->password)) {
            $user->password = bcrypt($request->new_password);
            $user->update();
            return redirect()->route('myAccount')->with(['success'=>'Your password is successfully changed']);
        }
        return redirect()->back()->withErrors(['current_password'=>'Your current password is wrong']);
    }

    public function category(Category $category)
    {
        $brands = Brand::where('category_id', $category->id)->get();
        return view('frontend.category', [
            'brands'=>$brands
        ]);
    }
}
