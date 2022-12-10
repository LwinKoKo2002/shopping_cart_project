@extends('backend.layout.app')
@section('duration-active','mm-active')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users pe-7s-clock">
                </i>
            </div>
            <div>
                Create Duration
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-9">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{route('admin.duration.store')}}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="delivery_time">Delivery Time</label>
                        <input type="text" class="form-control @error('delivery_time') is-invalid @enderror"
                            id="delivery_time" name="delivery_time" placeholder="Enter your delivery time"
                            autocomplete="off" required value="{{old('delivery_time')}}">
                        @error('delivery_time')
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
    });
</script>
@endsection