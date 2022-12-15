@extends('frontend.layouts.app_plain')
@section('content')
<section class="container admin-auth">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh">
        <div class="col-lg-7 col-md-10">
            <div class="card shadow">
                <div class="card-body">
                    <h3>Admin Login</h3>
                    <p class="text-muted">Enter your e-mail and password</p>
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password :</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-login" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection