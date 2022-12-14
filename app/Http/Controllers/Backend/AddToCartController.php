<?php

namespace App\Http\Controllers\Backend;

use App\Models\AddToCart;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class AddToCartController extends Controller
{
    public function index()
    {
        return view('backend.add_to_cart.index');
    }

    public function ssd()
    {
        $query = AddToCart::with('customer', 'product');
        return DataTables::of($query)
        ->addColumn('plus-icon', function ($each) {
            return null;
        })
        ->addColumn('product_img', function ($each) {
            if ($each->product) {
                return '<img src="'.$each->product->get_image_path().'" alt="profie image"
                class="product_img">';
            }
            return '-';
        })
        ->editColumn('customer_id', function ($each) {
            if ($each->customer) {
                return $each->customer->name;
            }
            return '-';
        })
        ->editColumn('product_id', function ($each) {
            if ($each->product) {
                $product_name = $each->product->model;
                return $product_name;
            }
            return '-';
        })
        ->filterColumn('customer_id', function ($query, $keyword) {
            $query->whereHas('customer', function ($query) use ($keyword) {
                $query->where('name', 'like', '%'.$keyword.'%');
            });
        })
        ->filterColumn('product_id', function ($query, $keyword) {
            $query->whereHas('product', function ($query) use ($keyword) {
                $query->where('model', 'like', '%'.$keyword.'%');
            });
        })
        ->editColumn('updated_at', function ($each) {
            return $each->updated_at->format('Y-m-d H:i:s');
        })
        ->rawColumns(['product_img','user_agent'])
        ->make(true);
    }
}
