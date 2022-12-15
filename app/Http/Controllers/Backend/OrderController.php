<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.order.index');
    }

    public function ssd()
    {
        $query = Order::with('city', 'customer');
        return DataTables::of($query)
        ->addColumn('customer', function ($each) {
            if ($each->customer) {
                return $each->customer->name;
            }
            return '-';
        })
        ->editColumn('city_id', function ($each) {
            if ($each->city) {
                return $each->city->name;
            }
            return '-';
        })
        ->addColumn('order_item', function ($each) {
            $total = null;
            foreach ($each->orderItems as $item) {
                $total .=   '<tr>'.
                            '<td>'.$item->product->model.'</td>'.
                            '<td>'.$item->quantity.'</td>'.
                            '<td>'.number_format($item->price).'</td>'
                            .'</tr>'
                ;
            }
            return '
                    <table>
                        <tr>
                        <td>Product</td>
                        <td>Quantity</td>
                        <td>Price (MMK)</td>
                        </tr>
                        '.$total.'
                    </table>
                    ';
        })
        ->editColumn('total', function ($each) {
            return number_format($each->total);
        })
        ->editColumn('action', function ($each) {
            $delete_icon = '<a class="btn btn-danger delete_btn ml-xl-2 ml-lg-2 ml-md-2 ml-sm-2 ml-2 delete-icon my-2" href="#" data-id="'.$each->id.'">Delete</a>';
            return "<div class='action'>" . $delete_icon . "</div>";
        })
        ->filterColumn('customer', function ($query, $keyword) {
            $query->whereHas('customer', function ($query) use ($keyword) {
                $query->where('name', 'like', '%'.$keyword.'%');
            });
        })
        ->filterColumn('city_id', function ($query, $keyword) {
            $query->whereHas('city', function ($query) use ($keyword) {
                $query->where('name', 'like', '%'.$keyword.'%');
            });
        })
        ->rawColumns(['order_item','action'])
        ->make(true);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return "success";
    }
}
