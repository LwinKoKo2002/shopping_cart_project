@extends('frontend.layouts.app')
@section('title','Electro')
@section('content')
<!----------- Feature Product ----------->
<section class="feature-product">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10">
                <h5>Smartphone Collection</h5>
                <div class="row notebook-slide">
                    @foreach ($brands->where('category_id',1) as $brand)
                    <div class="col-6 col-sm-3 col-lg-3 col-xl-2 col-md-3">
                        <div class="notebook-item d-flex flex-column align-items-center">
                            <img src="{{$brand->get_image_path()}}" alt="" />
                            <p>
                                <a href="/brands/{{$brand->id}}">
                                    {{$brand->name}}
                                    <i class="fa-sharp fa-solid fa-arrow-right ml-2"></i>
                                </a>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10">
                <h5>Tablet Collection</h5>
                <div class="row notebook-slide-two">
                    @foreach ($brands->where('category_id',2) as $brand)
                    <div class="col-6 col-sm-3 col-lg-3 col-xl-2 col-md-3">
                        <div class="notebook-item d-flex flex-column align-items-center">
                            <img src="{{$brand->get_image_path()}}" alt="" />
                            <p><a href="/brands/{{$brand->id}}">{{$brand->name}}</a></p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection