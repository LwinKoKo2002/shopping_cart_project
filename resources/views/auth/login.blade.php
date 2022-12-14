@extends('frontend.layouts.app')
@section('title','Login Form')
@section('content')
<section class="container auth vh-90">
    <div class="row">
        <div class="col-12">
            <h5 class="text-center">Login to my account</h5>
            <p class="text-center text-black-50">
                Enter your e-mail and password
            </p>
            <div class="d-flex justify-content-center">
                <div class="col-md-8 col-sm-12 col-12 ">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Email" value="{{ old('email') }}" required autocomplete="email"
                                autofocus />
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Password" required autocomplete="current-password" />
                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-block" type="submit">Login</button>
                        <p class="mt-4 text-center mb-2">
                            New Customer?<a href="{{ route('register') }}" class="ml-1">Create your account</a>
                        </p>
                        <p class="text-center">
                            Lost Password? @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                Recover password
                            </a>
                            @endif
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection