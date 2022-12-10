<section class="carousel-section">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($products->where('trend',1) as $product)
            <div class="carousel-item @if($product->model === 'iPhone 13 Pro Max') active @endif">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{$product->get_image_path()}}" alt="carousle-image" />
                    <div class="detail">
                        <h1>{{$product->model}}</h1>
                        <div class="mobile-detail">
                            <p>{{$product->screen_size}}</p>
                            <p>{{$product->storage}}</p>
                            <p>Rear Camera {{$product->front_camera}}</p>
                        </div>
                        <h5>K {{number_format($product->selling_price)}}</h5>
                        <button class="btn btn-theme">
                            <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                            Shop now!
                        </button>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
</section>