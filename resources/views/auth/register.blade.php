@extends('frontend.layouts.app')
@section('title','registration form')
@section('content')
<section class="container auth vh-90">
    <div class="row">
        <div class="col-12">
            <h5 class="text-center">Create my Account</h5>
            <p class="text-center text-black-50">
                Please fill in the information below:
            </p>
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-8">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Your Name" value="{{ old('name') }}" required autocomplete="name"
                                autofocus />
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Your Email" value="{{ old('email') }}" required autocomplete="email" />
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                placeholder="Phone Number" value="{{ old('phone') }}" required autocomplete="phone" />
                            @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Your Password" required autocomplete="new-password" />
                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password_confirmation" required
                                autocomplete="new-password" placeholder="Confirm your password" />
                        </div>

                        <button class="btn btn-block" type="submit">Create my account</button>
                        <p class="mt-4 text-center">
                            Alreay have an account?<a href="{{ route('register') }}" class="ml-1">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection