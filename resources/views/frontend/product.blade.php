@extends('frontend.layouts.app')
@section('title','Product Detail')
@section('content')
<!--------- Product  Detail----------->
<section class="product-detail">
    <div class="d-flex justify-content-center">
        <div class="col-xl-9 col-lg-10">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="card product-detail-item shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 col-12">
                                    <div class="product-detail-image ">
                                        <img src="{{$product->get_image_path()}}" alt="{{$product->model}}"
                                            width="200px" class="oringinal-image" />
                                    </div>
                                </div>
                                <div class="col-md-7 col-12">
                                    <div class="product-detail-feature">
                                        <h5 class="mb-3">{{$product->model}}</h5>
                                        <p>
                                            - {{$product->screen_size}}
                                        </p>
                                        <p>- {{$product->cpu}}</p>
                                        <p>- Ram {{$product->ram}}</p>
                                        <p>- {{$product->storage}} storage</p>
                                        <p>- Rear Camera {{$product->back_camera}}</p>
                                        <p>- Front Camera {{$product->front_camera}}</p>
                                        <p>- {{$product->battery}} Battery</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6>{{$product->product_name}}</h6>
                                <h6>{{$product->warranty}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="card product-checkout-section shadow-sm product_data">
                        <div class="card-body">
                            <h5>{{$product->model}} {{$product->storage}}</h5>
                            <hr />
                            <p class="price">
                                <span class="text-dark">Price :</span> K {{number_format($product->selling_price)}}
                            </p>
                            <div class="quantity-feature d-flex align-items-center">
                                <div class="mr-3">
                                    <p class="mb-0">Quantity :</p>
                                </div>
                                <div class="select-quantity">
                                    <button class="btn btn-light decrement_btn">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                    <input type="hidden" value="{{ $product->quantity }}" class="product_qty">
                                    <input type="hidden" value="{{ $product->id }}" class="product_id">
                                    <input type="text" name="quantity" value="1" class="qty_input" />
                                    <button class="btn btn-light increment_btn">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                @if ($product->quantity > 0)
                                <div class="col-md-6 col-sm-12 col-12">
                                    <button class="btn add-btn btn-block add_to_cart">Add to cart</button>
                                </div>
                                <div class="col-md-6 col-sm-12 col-12">
                                    <button class="btn buy-btn btn-block buy_btn">By it now</button>
                                </div>
                                @else
                                <div class="col-md-12 col-sm-12 col-12 mt-3">
                                    <span class="badge badge-danger" style="letter-spacing: 1px">Out of stock</span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    $('.buy_btn').click(function(e){
        e.preventDefault();
        let product_id = $(this).closest('.product_data').find('.product_id').val();
        let qty = $(this).closest('.product_data').find('.qty_input').val();
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id':product_id,
                'qty':qty
            },
            success: function (response) {
                if(response.status === 'success'){
                    window.location.replace('/checkout');
                    loadCartCount();
                }else{
                    Swal.fire(response.message);
                }
            }
        });
    })
</script>
@endsection