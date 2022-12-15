@extends('frontend.layouts.app')
@section('title','My Order')
@section('content')
<section class="my-account">
        <div class="d-flex justify-content-center">
                <div class="col-xl-9 col-lg-10">
                        <div class="row">
                                <div class="col-lg-3  d-none d-lg-block">
                                        <div class="card shadow">
                                                <div class="card-body">
                                                        <p><a href="{{ route('myAccount') }}">User Account</a></p>
                                                        <p><a href="{{ route('myOrder') }}">My Orders</a></p>
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

                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</section>
@endsection