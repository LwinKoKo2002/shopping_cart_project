@extends('frontend.layouts.app_plain')
@section('content')
<div class="container-fluid checkout-form">
        <form action="/checkout" method="POST">
                @csrf
                <div
                        class="row flex-xl-row flex-lg-row flex-md-column-reverse flex-sm-column-reverse flex-column-reverse">
                        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 vh-100 border-right">
                                <div class="row justify-content-xl-end justify-content-lg-end mr-xl-5 mr-lg-5">
                                        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                                <h5>Contact Information</h5>
                                                <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="form-group">
                                                                        <input type="text"
                                                                                class="form-control @error('fname') is-invalid @enderror"
                                                                                placeholder="First name" name="fname"
                                                                                value="{{ old('fname') }}" />
                                                                        @error('fname')
                                                                        <small class="text-danger">{{ $message
                                                                                }}</small>
                                                                        @enderror
                                                                </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                                <div class="form-group">
                                                                        <input type="text"
                                                                                class="form-control @error('lname') is-invalid @enderror"
                                                                                placeholder="Last name" name="lname"
                                                                                value="{{ old('lname') }}" />
                                                                        @error('lname')
                                                                        <small class="text-danger">{{ $message
                                                                                }}</small>
                                                                        @enderror
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <input type="email" name="email"
                                                                class="form-control @error('phone') is-invalid @enderror"
                                                                placeholder="Email"
                                                                value="{{ old('email',auth()->user()->email) }}" />
                                                        @error('email')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                </div>
                                                <div class="form-group">
                                                        <input type="number" name="phone"
                                                                class="form-control @error('phone') is-invalid @enderror"
                                                                placeholder="Phone"
                                                                value="{{ old('phone',auth()->user()->phone) }}" />
                                                        @error('phone')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                </div>
                                                <div class="form-group">
                                                        <input type="text" name="address"
                                                                class="form-control @error('address') is-invalid @enderror"
                                                                placeholder="Address"
                                                                value="{{ old('address',auth()->user()->address) }}" />
                                                        @error('address')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                </div>
                                                <select name="city_id" class="city custom-select">
                                                        @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}" {{ old('city_id',auth()->
                                                                user()->city_id)==$city->id ?
                                                                'selected' : ''}}>{{
                                                                $city->name }}
                                                        </option>
                                                        @endforeach
                                                </select>
                                                <div
                                                        class="d-flex justify-content-between align-items-center mt-4 mb-4">
                                                        <a href="{{ route('showCart') }}"><i
                                                                        class="fas fa-angle-left"></i> Return to
                                                                cart</a>
                                                        <button class="btn btn-theme" type="submit">Confirm to
                                                                order</button>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div
                                class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 vh-100 bg-secondary d-xl-block d-lg-block">
                                <div class="row order-summary ml-xl-3 ml-lg-3">
                                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                                <h5>Order Summary</h5>
                                                @php
                                                $product_total = 0;
                                                $total = 0;
                                                @endphp
                                                @foreach ($carts as $cartItem)
                                                @php
                                                $product_total = $cartItem->quantity *
                                                $cartItem->product->selling_price;
                                                $total += $cartItem->quantity * $cartItem->product->selling_price;
                                                @endphp
                                                <div class="summary-detail d-flex align-items-center">
                                                        <div class="product-summary-image">
                                                                <img src="{{ $cartItem->product->get_image_path() }}"
                                                                        alt="{{ $cartItem->product->model }}" />
                                                                <span class="badge badge-pill">{{ $cartItem->product_id
                                                                        }}</span>
                                                        </div>
                                                        <div class="product-summary-title">
                                                                <p>{{ $cartItem->product->model }}, {{
                                                                        $cartItem->product->storage }}</p>
                                                                <p class="text-black-50">{{
                                                                        number_format($cartItem->product->selling_price)
                                                                        }}
                                                                </p>
                                                        </div>
                                                        <div class="product-summary-price ml-auto">
                                                                <p>K {{ number_format($product_total) }}</p>
                                                        </div>
                                                </div>
                                                @endforeach
                                                <hr />
                                                <div
                                                        class="product-summary-total d-flex justify-content-between align-items-center">
                                                        <h6>Total</h6>
                                                        <h6><span class="text-muted">MMK</span> {{
                                                                number_format($total)}}</h6>
                                                        <input type="hidden" value="{{ $total }}" name="total">
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </form>
</div>
@endsection