@extends('frontend.layouts.app')
@yield('title','Products')
@section('content')
<!--------- Product  ----------->
<section class="product">
        <div class="container">
                <div class="row product-item">
                        @foreach ($brands as $brand)
                        @foreach ($brand->products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                <div class="card shadow-sm mb-4">
                                        <div class="card-body p-2">
                                                <a href="/products/{{$product->id}}"
                                                        class="product-image text-center mb-4">
                                                        <img src="{{$product->get_image_path()}}" alt="iphone-12"
                                                                width="200px" />
                                                </a>
                                                <a href="/products/{{$product->id}}"
                                                        class="product-title pl-2">{{$product->model}}
                                                        {{$product->storage}}</a>
                                                <p class="text-warning pl-2">Ks
                                                        {{number_format($product->selling_price)}}</p>
                                                @if ($product->quantity < 1) <p class="text-danger pl-2">
                                                        <i class="fas fa-circle"></i> Out of stock
                                                        </p>
                                                        @elseif($product->quantity < 5) <p class="text-danger pl-2">
                                                                <i class="fas fa-circle"></i> Only
                                                                {{$product->quantity}} unit left
                                                                </p>
                                                                @else
                                                                <p class="text-success pl-2">
                                                                        <i class="fas fa-circle"></i> In stock
                                                                </p>
                                                                @endif
                                        </div>
                                </div>
                        </div>
                        @endforeach
                        @endforeach
                </div>
        </div>
</section>
@endsection