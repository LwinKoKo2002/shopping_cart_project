@extends('backend.layout.app')
@section('city-active','mm-active')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users pe-7s-culture">
                </i>
            </div>
            <div>
                Create City
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-9">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{route('admin.city.store')}}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Enter your city" autocomplete="off" required
                            value="{{old('name')}}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="delivery_time">Delivery_time</label>
                        <select name="delivery_time" id="delivery_time" class="delivery_time form-control" required>
                            <option value="">-- Please Choose --</option>
                            @foreach ($durations as $duration)
                            <option value="{{$duration->id}}" {{$duration->id == old('delivery_time') ? 'selected' :
                                ''}}>{{$duration->delivery_time}}</option>
                            @endforeach
                        </select>
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
        $('.delivery_time').select2({
            theme: 'bootstrap4',
            placeholder: "-- Please Choose --",
            allowClear: true
        });
    });
</script>
@endsection