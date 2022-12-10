@extends('backend.layout.app')
@section('product-active','mm-active')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users pe-7s-config">
                </i>
            </div>
            <div>
                Create Product
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-9">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="brand_id">Brand</label>
                        <select name="brand_id" id="brand_id" class="brand_id form-control">
                            <option value="">-- Please Choose --</option>
                            @foreach ($brands as $brand)
                            <option value="{{$brand->id}}" {{$brand->id == old('brand_id') ? 'selected' :
                                ''}}>{{$brand->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="product_img">Image</label>
                        <input type="file" class="form-control" id="product_img" name="product_img">
                        @error('product_img')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div id="preview_image" class="mb-4 "></div>

                    <div class="form-group mb-4">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                            id="product_name" name="product_name" placeholder="Enter your Product name"
                            autocomplete="off" value="{{old('product_name')}}">
                        @error('product_name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="model">Model</label>
                        <input type="text" class="form-control @error('model') is-invalid @enderror" id="model"
                            name="model" placeholder="Enter your model" autocomplete="off" value="{{old('model')}}">
                        @error('model')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="screen_size">Screen Size</label>
                        <input type="text" class="form-control @error('screen_size') is-invalid @enderror"
                            id="screen_size" name="screen_size" placeholder="Enter your  Screen Size" autocomplete="off"
                            value="{{old('screen_size')}}">
                        @error('screen_size')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="cpu">Cpu</label>
                        <input type="text" class="form-control @error('cpu') is-invalid @enderror" id="cpu" name="cpu"
                            placeholder="Enter your Cpu" autocomplete="off" value="{{old('cpu')}}">
                        @error('cpu')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="storage">Storage</label>
                        <input type="text" class="form-control @error('storage') is-invalid @enderror" id="storage"
                            name="storage" placeholder="Enter your storage" autocomplete="off"
                            value="{{old('storage')}}">
                        @error('storage')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="ram">Ram</label>
                        <input type="text" class="form-control @error('ram') is-invalid @enderror" id="ram" name="ram"
                            placeholder="Enter your ram" autocomplete="off" value="{{old('ram')}}">
                        @error('ram')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="back_camera">Back Camera</label>
                        <input type="text" class="form-control @error('back_camera') is-invalid @enderror"
                            id="back_camera" name="back_camera" placeholder="Enter your Back Camera" autocomplete="off"
                            value="{{old('back_camera')}}">
                        @error('back_camera')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="front_camera">Front Camera</label>
                        <input type="text" class="form-control @error('front_camera') is-invalid @enderror"
                            id="front_camera" name="front_camera" placeholder="Enter your Front Camera"
                            autocomplete="off" value="{{old('front_camera')}}">
                        @error('front_camera')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="battery">Battery</label>
                        <input type="text" class="form-control @error('battery') is-invalid @enderror" id="battery"
                            name="battery" placeholder="Enter your battery" autocomplete="off"
                            value="{{old('battery')}}">
                        @error('battery')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group mb-4">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                            name="quantity" placeholder="Enter your quantity" autocomplete="off"
                            value="{{old('quantity')}}">
                        @error('quantity')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="selling_price">Price (MMK)</label>
                        <input type="number" class="form-control @error('selling_price') is-invalid @enderror"
                            id="selling_price" name="selling_price" placeholder="Enter your selling price"
                            autocomplete="off" value="{{old('selling_price')}}">
                        @error('selling_price')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="warranty">Warranty</label>
                        <input type="text" class="form-control @error('warranty') is-invalid @enderror" id="warranty"
                            name="warranty" placeholder="Enter your warranty" autocomplete="off"
                            value="{{old('warranty')}}">
                        @error('warranty')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="trend">Trending</label>
                        <select name="trend" id="trend" class="trend form-control">
                            <option value="">-- Please Choose --</option>
                            <option value="0" @if (old('trend')===0 ) selected @endif>No</option>
                            <option value="1" @if (old('trend')===1 ) selected @endif>Yes</option>
                        </select>
                        @error('trend')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-center">
                        <button class="btn secondary-color mr-3" id="back-btn">Cancel</button>
                        <button type="submit" class="btn theme-color">Create</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('#back-btn').on('click',function(e){
            e.preventDefault();
            window.history.go(-1);
            return false;
        })
        $('.brand_id').select2({
            theme: 'bootstrap4',
            placeholder: "-- Please Choose --",
            allowClear: true
        });
        $('.trend').select2({
            theme: 'bootstrap4',
            placeholder: "-- Please Choose --",
            allowClear: true
        });
        $('#product_img').on('change',function(){
            let select_img = document.getElementById('product_img');
            let product_img = select_img.files;
            for(let i = 0 ; i<product_img.length ; i++){
                $('#preview_image').append(`<img src="${URL.createObjectURL(product_img[i])}"/>`);
            }
        })
    })
</script>
@endsection