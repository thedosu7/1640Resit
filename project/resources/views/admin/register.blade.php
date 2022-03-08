@extends('layouts.app')
@section('custom-css')
<style>
    .bg-image-vertical {
        position: relative;
        overflow: hidden;
        background-repeat: no-repeat;
        background-position: right center;
        background-size: auto 100%;
    }

    @media (min-width: 1025px) {
        .h-custom-2 {
            height: 100%;
        }
    }
</style>
@endsection

@section('content')
<section class="vh-100">
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-8 px-0 d-none d-sm-block">
                <a href="{{ route('home') }}"><img src="{{ asset('/images/login-background.png') }}" alt="Login background" class="w-100 vh-100" style="object-fit: cover; object-position: left;"></a>
            </div>
            <div class="col-sm-4 text-black">
                
                <div class="text-center px-5 ms-xl-4">
                    <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                    <img class="logo" src="{{ asset('/images/login-logo.png') }}" alt="login logo" style="margin: auto; height: 50px;margin-top: 100px">
                </div>
                <div class="align-items-center px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n51010

                    <form method="POST" action="{{ route('CreateAccount') }}">
                        @csrf
                        <h3 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;">Register</h3>
                         <div class="form-group first mb-4">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" required autocomplete="current-name" autofocus> 
                        </div>
                        <div class="form-group first mb-4">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" value="{{ old('email') }}" name="email" id="email" required
                            autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert" style="display: block">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group first mb-4">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert" style="display: block">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group first mb-4">
                            <label for="password">Password Confirm</label>
                            <input type="password" class="form-control" id="password" name="password_confirmation" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert" style="display: block">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="pt-1 mb-4">
                            <button class="btn btn-primary btn-lg btn-block" style="width: 100%" type="submit">Register</button>
                        </div>
                        <span class="d-block text-left my-4 text-muted"> If you already have an account, <a href="{{ route('login') }}"> Login here</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection