@extends('backend.layout.app')
@section('admin-active','mm-active')
@section('content')
<div class="app-page-title">
        <div class="page-title-wrapper">
                <div class="page-title-heading">
                        <div class="page-title-icon">
                                <i class="pe-7s-users icon-gradient bg-mean-fruit">
                                </i>
                        </div>
                        <div>
                                AdminUser
                        </div>
                </div>
        </div>
</div>
<div class="row">
        <div class="col-md-6">
                <div class="card">
                        <div class="card-body">
                                <div class="mb-4">
                                        <h5>Name</h5>
                                        <p class="text-muted">{{ auth()->guard('admin_user')->user()->name }}</p>
                                </div>
                                <div class="mb-4">
                                        <h5>Email Address</h5>
                                        <p class="text-muted">{{ auth()->guard('admin_user')->user()->email }}</p>
                                </div>
                                <div class="mb-4">
                                        <h5>Phone Number</h5>
                                        <p class="text-muted">{{ auth()->guard('admin_user')->user()->phone }}</p>
                                </div>
                                <a href="{{ route('admin.admin-user.edit',auth()->guard('admin_user')->id()) }}"
                                        class="btn theme-color mb-2">Edit User</a>
                        </div>
                </div>
        </div>
</div>
@endsection
@section('scripts')

@endsection