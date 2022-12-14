<?php

namespace App\Http\Controllers\Backend;

use App\Models\OrderItem;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class OrderItemController extends Controller
{
    public function index()
    {
        return view('backend.order_item.index');
    }

    public function ssd()
    {
        $query = OrderItem::with('order', 'product');
        return DataTables::of($query)
        ->addColumn('plus-icon', function ($each) {
            return null;
        })
        ->addColumn('customer', function ($each) {
            if ($each->order) {
                return $each->order->fname . " ".$each->order->lname;
            }
            return '-';
        })
        ->editColumn('product_img', function ($each) {
            if ($each->product) {
                return '<img src="'.$each->product->get_image_path().'" alt="profie image"
                class="product_img">';
            }
            return '-';
        })
        ->editColumn('product_id', function ($each) {
            if ($each->product) {
                return $each->product->model;
            }
            return '-';
        })
        ->editColumn('price', function ($each) {
            return number_format($each->price);
        })
        ->filterColumn('product_id', function ($query, $keyword) {
            $query->whereHas('product', function ($query) use ($keyword) {
                $query->where('model', 'like', '%'.$keyword.'%');
            });
        })
        ->filterColumn('customer', function ($query, $keyword) {
            $query->whereHas('order', function ($query) use ($keyword) {
                $query->where('fname', 'like', '%'.$keyword.'%');
            });
        })
        ->rawColumns(['product_img'])
        ->make(true);
    }
}
