@extends('frontend.layouts.app')
@section('title','Add To Cart')
@section('content')
<section class="add-to-cart ">
        <div class="d-flex justify-content-center">
                <div class="col-xl-9 col-lg-10">
                        @if ($carts->count() > 0)
                        <div class="row">
                                <div class="col-12">
                                        <h5>My Cart</h5>
                                </div>
                                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                                        <div class="card shadow-sm border mb-4">
                                                <div class="card-body p-0">
                                                        <div class="table-responsive">
                                                                <table class="table table-borderless" width="100%">
                                                                        <thead>
                                                                                <tr>
                                                                                        <th class="pl-4 py-3">Product
                                                                                        </th>
                                                                                        <th class="text-center py-3">
                                                                                                Quantity</th>
                                                                                        <th class="text-right py-3">
                                                                                                Total</th>
                                                                                </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                                @php
                                                                                $product_total = 0;
                                                                                $total = 0;
                                                                                @endphp
                                                                                @foreach ($carts as $cartItem)
                                                                                @php
                                                                                $product_total = $cartItem->quantity *
                                                                                $cartItem->product->selling_price;
                                                                                $total += $cartItem->quantity *
                                                                                $cartItem->product->selling_price;
                                                                                @endphp
                                                                                <tr class="border-top product_data">
                                                                                        <td
                                                                                                class="d-flex align-items-center py-1">
                                                                                                <div
                                                                                                        class="checkout-image mr-2">
                                                                                                        <img src="{{ $cartItem->product->get_image_path() }}"
                                                                                                                alt="product_iamge"
                                                                                                                width="100px" />
                                                                                                </div>
                                                                                                <div
                                                                                                        class="checkout-feature">
                                                                                                        <p>{{ $cartItem->product->model
                                                                                                                }} {{
                                                                                                                $cartItem->product->storage
                                                                                                                }}</p>
                                                                                                        <p
                                                                                                                class="text-danger">
                                                                                                                K {{
                                                                                                                number_format($cartItem->product->selling_price)
                                                                                                                }}
                                                                                                        </p>
                                                                                                </div>
                                                                                        </td>
                                                                                        <td
                                                                                                class="text-center align-middle py-1">
                                                                                                <button
                                                                                                        class="btn btn-light decrement_btn changeBtn">
                                                                                                        <i
                                                                                                                class="fa-solid fa-minus"></i>
                                                                                                </button>
                                                                                                <input type="hidden"
                                                                                                        value="{{ $cartItem->product_id }}"
                                                                                                        class="product_id">
                                                                                                <input type="hidden"
                                                                                                        value="{{ $cartItem->product->quantity }}"
                                                                                                        class="product_qty">
                                                                                                <input type="number"
                                                                                                        name="quantity"
                                                                                                        value="{{ $cartItem->quantity }}"
                                                                                                        class="qty_input"
                                                                                                        disabled />
                                                                                                <button
                                                                                                        class="btn btn-light increment_btn changeBtn">
                                                                                                        <i
                                                                                                                class="fa-solid fa-plus"></i>
                                                                                                </button>
                                                                                                <p class="mb-0 mt-2 text-muted remove_btn"
                                                                                                        style="cursor: pointer">
                                                                                                        remove
                                                                                                </p>
                                                                                        </td>
                                                                                        <td
                                                                                                class="text-right align-middle py-1">
                                                                                                <p
                                                                                                        class="font-weight-normal">
                                                                                                        K {{
                                                                                                        number_format($product_total)
                                                                                                        }}
                                                                                                </p>
                                                                                        </td>
                                                                                </tr>
                                                                                @endforeach
                                                                        </tbody>
                                                                </table>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="card shadow-sm">
                                                <div class="card-body">
                                                        <div class="checkout-total d-flex justify-content-between">
                                                                <h6>Total</h6>
                                                                <h6>K {{
                                                                        number_format($total)
                                                                        }}</h6>
                                                        </div>
                                                        <hr />
                                                        <a href="{{ route('checkout') }}"
                                                                class="btn btn-theme btn-block mt-4">
                                                                Continue to checkout
                                                        </a>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        @else
                        <div class="text-center shopping">
                                {{-- <a href="https://iconscout.com/illustrations/empty-cart" target="_blank">Empty cart
                                        Illustration</a> by <a href="https://iconscout.com/contributors/iconscout"
                                        target="_blank">IconScout Store</a> --}}
                                <img src="{{ asset('/frontend/images/empty.webp') }}" alt="shopping-cart">
                                <h2 class="my-4 text-danger">Oops! Your Cart is Empty</h2>
                                <p>Looks like you haven't added anything to your cart yet!</p>
                                <a href="{{ route('home') }}" class="btn btn-theme my-4">Continue to shopping</a>
                        </div>
                        @endif
                </div>
        </div>
</section>
@endsection