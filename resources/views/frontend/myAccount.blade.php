@extends('frontend.layouts.app')
@section('my_account-active','active')
@section('title','My Order')
@section('content')
<section class="my-account">
        <div class="d-flex justify-content-center">
                <div class="col-xl-9 col-lg-10">
                        <div class="row">
                                <div class="col-lg-3  d-none d-lg-block">
                                        <div class="card shadow">
                                                <div class="card-body">
                                                        <p class="@yield('my_account-active')"><a
                                                                        href="{{ route('myAccount') }}">User Account</a>
                                                        </p>
                                                        <p class="@yield('my_order-active')"><a
                                                                        href="{{ route('myOrder') }}">My Orders</a></p>
                                                        <form action="{{ route('logout') }}" method="POST"
                                                                id="submit_form">
                                                                @csrf
                                                                <button type="submit"
                                                                        class="btn btn-link logoutBtn pl-0">Logout</button>
                                                        </form>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-9 ">
                                        <div class="card shadow">
                                                <div class="card-header">
                                                        <h3>My profile</h3>
                                                </div>
                                                <div class="card-body">
                                                        <div class="row">
                                                                <div class="col-md-4">
                                                                        <p>Full Name</p>
                                                                        <p class="text-muted">{{
                                                                                auth()->user()->name }}
                                                                        </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                        <p>Email Address</p>
                                                                        <p class="text-muted"> {{ auth()->user()->email
                                                                                }}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                        <p>Phone Number</p>
                                                                        <p class="text-muted">{{ auth()->user()->phone
                                                                                }}</p>
                                                                </div>
                                                        </div>
                                                        <a class="btn btn-theme"
                                                                href="{{ route('change-password') }}">Change
                                                                Password</a>
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
        $(document).ready(function () {
                const Toast = Swal.mixin({
                        toast: true,
                        position: 'middle-middle',
                        showConfirmButton: false,       
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
})

                @if(session('success'))
                Toast.fire({
                icon: 'success',
                title: "{{ session('success') }}"
                })
                @endif
        });
</script>
@endsection