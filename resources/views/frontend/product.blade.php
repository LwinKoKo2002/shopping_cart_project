@extends('frontend.layouts.app')
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
                    <div class="card product-checkout-section shadow-sm">
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
                                    <input type="text" name="quantity" value="1" class="qty_input" />
                                    <button class="btn btn-light increment_btn">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-12">
                                    <button class="btn add-btn btn-block">Add to cart</button>
                                </div>
                                <div class="col-md-6 col-sm-12 col-12">
                                    <button class="btn buy-btn btn-block">By it now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="card review shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="review-item">
                                    <h6>Customer Reviews</h6>
                                    <p class="text-black-50">No reviews yet</p>
                                </div>
                                <div class="review-button">
                                    <button class="btn btn-theme add-comment-review">
                                        Write a review
                                    </button>
                                </div>
                            </div>
                            <div class="row comment-review"></div>
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
    $(document).ready(function(){
        var product_qty = "{{$product->quantity}}";
        $('.increment_btn').on('click',function(e){
            e.preventDefault();
            let inc_value = $('.qty_input').val();
            let  value = parseInt(inc_value,product_qty);
             value = isNaN(value) ? '0' : value;
             if(value < product_qty){
                    value++;
                    $('.qty_input').val(value);
             }
        })

        $('.decrement_btn').on('click',function(e){
            e.preventDefault();
            let dec_value = $('.qty_input').val();
            let  value = parseInt(dec_value,product_qty);
             value = isNaN(value) ? '0' : value;
             if(value > 1){
                    value--;
                    $('.qty_input').val(value);
             }
        })
        // $('.add-btn').on('click',function(e){
        //     e.preventDefault();
        //     let qty = document.querySelector('.input_qty').val();
        //     alert(qty);
        // })
    })
</script>
@endsection