@extends('frontend.layouts.app_plain')
@section('content')
<section class="container verify-email">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h3>Verify Your Email Address</h3>
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">A fresh verification link has been sent to your email
                        address.
                    </div>
                    @endif
                    <p>Before proceeding, please check your email for a verification link.</p>
                    <p>If you did not receive the email</p>
                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link">click here to request another</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection