@extends('frontend.layouts.app')
@section('title','My Order')
@section('content')
<section class="my-order">
        <div class="d-flex justify-content-center">
                <div class="col-xl-9 col-lg-10">
                        <div class="row">
                                <div class="col-lg-3  d-none d-lg-block">
                                        <div class="card shadow">
                                                <div class="card-body">
                                                        <p><a href="{{ route('myAccount') }}">Manage My Account</a></p>
                                                        <p><a href="{{ route('myOrder') }}">My Orders</a></p>
                                                        <form action="{{ route('logout') }}" method="POST"
                                                                id="submit_form">
                                                                @csrf
                                                                <button type="submit"
                                                                        class="btn btn-link logoutBtn pl-0">Logout</button>
                                                        </form>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-9 ">
                                        <div class="card shadow ">
                                                <div class="card-header">
                                                        <h3>My orders</h3>
                                                </div>
                                                <div class="card-body">
                                                        @if ($orders->count() > 0)
                                                        <div class="table-responsive" width="100%">
                                                                <table class="table table-bordered"
                                                                        style="border:none;">
                                                                        <thead>
                                                                                <tr>
                                                                                        <th>Address</th>
                                                                                        <th>City</th>
                                                                                        <th>Duration</th>
                                                                                        <th>Product Items</th>
                                                                                        <th>Total (MMK)</th>
                                                                                </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                                @foreach ($orders as $order)
                                                                                <tr>
                                                                                        <th>{{ $order->address }}</th>
                                                                                        <td>{{ $order->city->name }}
                                                                                        </td>
                                                                                        <td>{{ $order->city->duration->delivery_time
                                                                                                }}</td>
                                                                                        <td>
                                                                                                <table>
                                                                                                        <tr>
                                                                                                                <td>Product
                                                                                                                        Image
                                                                                                                </td>
                                                                                                                <td>Product
                                                                                                                </td>
                                                                                                                <td>Storage
                                                                                                                </td>
                                                                                                                <td>Ram
                                                                                                                </td>
                                                                                                                <td>Quantity
                                                                                                                </td>
                                                                                                                <td>Price
                                                                                                                        (MMK)
                                                                                                        </tr>
                                                                                                        @foreach($order->orderItems
                                                                                                        as
                                                                                                        $item)
                                                                                                        <tr>
                                                                                                                <td><img src="{{ $item->product->get_image_path() }}"
                                                                                                                                alt="product-image"
                                                                                                                                class="product_img">
                                                                                                                </td>
                                                                                                                <td>{{ $item->product->model
                                                                                                                        }}
                                                                                                                </td>
                                                                                                                <td>{{ $item->product->storage
                                                                                                                        }}
                                                                                                                </td>
                                                                                                                <td>{{ $item->product->ram
                                                                                                                        }}
                                                                                                                </td>
                                                                                                                <td>{{ $item->quantity
                                                                                                                        }}
                                                                                                                </td>
                                                                                                                <td>{{number_format($item->price)
                                                                                                                        }}
                                                                                                                </td>
                                                                                                        </tr>
                                                                                                        @endforeach
                                                                                                </table>
                                                                                        </td>
                                                                                        <td>{{ number_format($order->total)
                                                                                                }}</td>
                                                                                </tr>
                                                                                @endforeach
                                                                        </tbody>
                                                                </table>
                                                        </div>

                                                        @else
                                                        <div class="text-center no-order">
                                                                <i class="fa-sharp fa-solid fa-box"></i>
                                                                <p class="text-muted">No orders yet!</p>
                                                                <a class="btn btn-theme" href="{{ route('home') }}">Make
                                                                        your first
                                                                        order</a>
                                                        </div>
                                                        @endif
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</section>
@endsection