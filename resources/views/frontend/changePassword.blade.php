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
                                                        <form method="POST" action="{{ route('store-password') }}">
                                                                @csrf
                                                                <div class="form-group">
                                                                        <label for="current_password">Current
                                                                                Password</label>
                                                                        <input id="current_password" type="password"
                                                                                class="form-control @error('current_password') is-invalid @enderror"
                                                                                name="current_password" required
                                                                                autocomplete="current-password">

                                                                        @error('current_password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                                <small>{{ $message }}</small>
                                                                        </span>
                                                                        @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                        <label for="new_password">New Password</label>
                                                                        <input id="new_password" type="password"
                                                                                class="form-control @error('new_password') is-invalid @enderror"
                                                                                name="new_password" required
                                                                                autocomplete="new-password">
                                                                        @error('new_password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                                <small>{{ $message }}</small>
                                                                        </span>
                                                                        @enderror
                                                                </div>
                                                                <button class="btn btn-block btn-theme "
                                                                        type="submit">Reset Password</button>
                                                        </form>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</section>
@endsection