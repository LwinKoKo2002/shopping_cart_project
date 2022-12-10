@extends('backend.layout.app')
@section('brand-active','mm-active')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-diamond">
                </i>
            </div>
            <div>
                Create Brand
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-9">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{route('admin.brand.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Enter your brand name" autocomplete="off" required
                            value="{{old('name')}}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="category_id form-control" required>
                            <option value="">-- Please Choose --</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$category->id == old('category_id') ? 'selected' :
                                ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="brand_img">Image</label>
                        <input type="file" class="form-control" id="brand_img" name="brand_img">
                        @error('brand_img')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div id="preview_image" class="mb-4 "></div>

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
        $('.category_id').select2({
            theme: 'bootstrap4',
            placeholder: "-- Please Choose --",
            allowClear: true
        });
        $('#brand_img').on('change',function(){
            let select_img = document.getElementById('brand_img');
            let brand_img = select_img.files;
            for(let i = 0 ; i<brand_img.length ; i++){
                $('#preview_image').append(`<img src="${URL.createObjectURL(brand_img[i])}"/>`);
            }
        })
    });
</script>
@endsection