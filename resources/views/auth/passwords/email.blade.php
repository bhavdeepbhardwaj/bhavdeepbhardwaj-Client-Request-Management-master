@extends('layouts.app')

@section('title')
    @lang('title.forgot')
@endsection

@section('content')
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">
                        <div class="brand-logo">
                            <img src="{{ asset('images/logo.png') }}" alt="logo">
                        </div>
                        <h4>New here?</h4>
                        <h6 class="fw-light">Join us today! It takes only few steps</h6>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                                <div class="text-center mt-4 fw-light col-md-6 offset-md-4">
                                    Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 register-half-bg d-flex flex-row">
                    <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2021 All
                        rights reserved.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
@endsection

{{-- <form class="pt-3" method="POST" action="{{ route('changePassword') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Type Your Current Password</label>
        <div class="input-group">
            <div class="input-group-prepend bg-transparent">
                <span class="input-group-text bg-transparent border-right-0">
                    <i class="ti-lock text-primary"></i>
                </span>
            </div>
            <input class="form-control" type="password" name="current_password">
        </div>
    </div>
    <div class="form-group">
        <label>Type Your New Password</label>
        <div class="input-group">
            <div class="input-group-prepend bg-transparent">
                <span class="input-group-text bg-transparent border-right-0">
                    <i class="ti-lock text-primary"></i>
                </span>
            </div>
            <input class="form-control" type="password" name="new_password">
        </div>
    </div>
    <div class="form-group">
        <label>Type Your Confirm New Password</label>
        <div class="input-group">
            <div class="input-group-prepend bg-transparent">
                <span class="input-group-text bg-transparent border-right-0">
                    <i class="ti-lock text-primary"></i>
                </span>
            </div>
            <input class="form-control" type="password" name="confirm_password">
        </div>
    </div>
    <div class="mt-3">
        <button type="submit"
            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Reset
            Password</button>
    </div>
    <div class="text-center mt-4 fw-light">
        Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
    </div>
</form> --}}
