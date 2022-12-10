<?php

namespace App\Http\Controllers\Backend;

use App\Models\AddToCart;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Validation\Rule;

class AddToCartController extends Controller
{
    public function index()
    {
        return view('backend.add_to_cart.index');
    }

  
    public function ssd()
    {
        $query = AddToCart::with('product');
        return DataTables::of($query)
        ->addColumn('plus-icon', function ($each) {
            return null;
        })
        ->editColumn('product_id', function ($each) {
            if ($each->product) {
                $product_name = $each->product->model;
                return $product_name;
            }
            return '-';
        })
        ->filterColumn('product_id', function ($query, $keyword) {
            $query->whereHas('product', function ($query) use ($keyword) {
                $query->where('model', 'like', '%'.$keyword.'%');
            });
        })
        ->editColumn('action', function ($each) {
            $edit_icon = '<a class="btn btn-warning edit-icon my-2 ml-xl-2 ml-lg-2 ml-md-2 ml-sm-2 ml-0" href="'.route('admin.add-to-cart.edit', $each->id).'">Edit</a>';
            $delete_icon = '<a class="btn btn-danger delete_btn ml-xl-2 ml-lg-2 ml-md-2 ml-sm-2 ml-2 delete-icon my-2" href="#" data-id="'.$each->id.'">Delete</a>';

            return "<div class='action'>" . $edit_icon . $delete_icon . "</div>";
        })
        ->editColumn('updated_at', function ($each) {
            return $each->updated_at->format('Y-m-d H:i:s');
        })
        ->rawColumns(['user_agent','action'])
        ->make(true);
    }

    public function create()
    {
        $products = Product::all();
        return view('backend.add_to_cart.create', compact('products'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id'=>['required',Rule::exists('products', 'id')],
            'quantity'=>['required'],
            'total_price'=>['required']
        ], [
            'product_id.required'=>'Please filled your product.',
            'total_price.required'=>'Please filled your total price.'
        ]);

        if ($request->quantity < 1) {
            return back()->withErrors(['quantity'=>'Your quantity must be at least 1']);
        }

        if ($request->total_price < 1000) {
            return back()->withErrors(['total_price'=>'Your total price must be at least 1000 Kyats.']);
        }
        $add_to_cart = new AddToCart();
        $add_to_cart->product_id = $request->product_id;
        $add_to_cart->quantity = $request->quantity;
        $add_to_cart->total_price = $request->total_price;
        $add_to_cart->save();
        return redirect()->route('admin.add-to-cart.index')->with(['success'=>'Successfully Created']);
    }

 
    public function edit(AddToCart $add_to_cart)
    {
        $products = Product::all();
        return view('backend.add_to_cart.edit', compact('products', 'add_to_cart'));
    }

 
    public function update(Request $request, AddToCart $add_to_cart)
    {
        $request->validate([
            'product_id'=>['required',Rule::exists('products', 'id')],
            'quantity'=>['required'],
            'total_price'=>['required']
        ], [
            'product_id.required'=>'Please filled your product.',
            'total_price.required'=>'Please filled your total price.'
        ]);

        if ($request->quantity < 1) {
            return back()->withErrors(['quantity'=>'Your quantity must be at least 1']);
        }

        if ($request->total_price < 1000) {
            return back()->withErrors(['total_price'=>'Your total price must be at least 1000 Kyats.']);
        }
        $add_to_cart->product_id = $request->product_id;
        $add_to_cart->quantity = $request->quantity;
        $add_to_cart->total_price = $request->total_price;
        $add_to_cart->update();
        return redirect()->route('admin.add-to-cart.index')->with(['update'=>'Successfully Updated']);
    }

 
    public function destroy(AddToCart $add_to_cart)
    {
        $add_to_cart->delete();
        return "success";
    }
}
