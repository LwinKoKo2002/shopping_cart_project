@extends('frontend.layouts.app')
@yield('title','Products')
@section('content')
<!--------- Product  ----------->
<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product-header">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="product-title">
                                <h5>{{$brand->name}}</h5>
                                <p class="text-black-50">
                                    {{$brand->products->count()}} items found in
                                    <span>{{$brand->name}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="product-filter row align-items-center my-2">
                                <div class="col-3 text-lg-right text-md-right text-sm-left text-left">
                                    <p class="mb-0">Sort By :</p>
                                </div>
                                <div class="col-9 pl-0">
                                    <select class="custom-select">
                                        <option>Large select</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="row product-item">
            @foreach ($brand->products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-body p-2">
                        <a href="/products/{{$product->id}}" class="product-image text-center mb-4">
                            <img src="{{$product->get_image_path()}}" alt="iphone-12" width="200px" />
                        </a>
                        <a href="/products/{{$product->id}}" class="product-title pl-2">{{$product->model}}
                            {{$product->storage}}</a>
                        <p class="text-warning pl-2">Ks {{number_format($product->selling_price)}}</p>
                        <a href="" class="product-review pl-2 text-black-50">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                            No reviews
                        </a>
                        @if ($product->quantity < 1) <p class="text-danger pl-2">
                            <i class="fas fa-circle"></i> Out of stock
                            </p>
                            @elseif($product->quantity < 3) <p class="text-danger pl-2">
                                <i class="fas fa-circle"></i> Only {{$product->quantity}} unit left
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
        </div>
    </div>
</section>
@endsection