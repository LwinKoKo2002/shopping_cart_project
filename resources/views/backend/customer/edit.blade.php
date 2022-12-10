@extends('backend.layout.app')
@section('customer-active','mm-active')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-user ">
                </i>
            </div>
            <div>
                Edit Customer
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-9">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{route('admin.customer.update',$customer->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Enter your name" autocomplete="off" required
                            value="{{old('name',$customer->name)}}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Enter your email" autocomplete="off" required
                            value="{{old('email',$customer->email)}}">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" class="form-control  @error('phone') is-invalid @enderror" id="phone"
                            name="phone" placeholder="Enter your phone" autocomplete="off" required
                            value="{{old('phone',$customer->phone)}}">
                        @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control  @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Enter your password" autocomplete="off" required
                            value="{{old('password')}}">
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="city">City</label>
                        <select name="city_id" id="city" class="city form-control" required>
                            <option value="">-- Please Choose --</option>
                            @foreach ($cities as $city)
                            <option value="{{$city->id}}" {{$city->id == old('city_id',$customer->city_id) ? 'selected'
                                :
                                ''}}>{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" cols="5" rows="3" class="form-control editor">{!!old('address',$customer->address)!!}
                        </textarea>
                        @error('address')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn secondary-color mr-3" id="back-btn">Cancel</button>
                        <button type="submit" class="btn theme-color">Update</button>
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
        $('.city').select2({
            theme: 'bootstrap4',
            placeholder: "-- Please Choose --",
            allowClear: true
        });
    });
</script>
@endsection