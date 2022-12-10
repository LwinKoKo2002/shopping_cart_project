@extends('backend.layout.app')
@section('add_to_cart-active','mm-active')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users pe-7s-cart">
                </i>
            </div>
            <div>
                Create Add To Cart
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-9">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{route('admin.add-to-cart.store')}}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="product_id">Product</label>
                        <select name="product_id" id="product_id" class="product_id form-control" required>
                            <option value="">-- Please Choose --</option>
                            @foreach ($products as $product)
                            <option value="{{$product->id}}" {{$product->id == old('product_id') ? 'selected' :
                                ''}}>{{$product->model}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="quantity">Quantity</label>
                        <input type="number" id="quantity" name="quantity" value="{{old('quantity')}}"
                            @error('quantity') is-invalid @enderror" autocomplete="off" required
                            placeholder="Enter your quantity" class="form-control">
                        @error('quantity')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="total_price">Total Price (MMK)</label>
                        <input type="number" id="total_price" name="total_price" value="{{old('total_price')}}"
                            @error('total_price') is-invalid @enderror" autocomplete="off" required
                            placeholder="Enter your total price" class="form-control">
                        @error('total_price')
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
        $('.product_id').select2({
            theme: 'bootstrap4',
            placeholder: "-- Please Choose --",
            allowClear: true
        });
    });
</script>
@endsection