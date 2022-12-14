@extends('frontend.layouts.app_plain')

@section('content')
<section class="container reset-email-link">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h3>Reset your password</h3>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p class="text-muted">Enter a valid e-mail to receive instructions on how to reset your
                        password.</p>
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                            @enderror
                        </div>
                        <button class="btn btn-block btn-theme" type="submit">Reset Password</button>
                        <p class="mt-4 text-center sign-up-text">
                            Don't have an account?<a href="{{ route('register') }}" class="ml-1">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection