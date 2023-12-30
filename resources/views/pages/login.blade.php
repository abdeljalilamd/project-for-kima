@extends('layouts.onway')
@section('title','Login')
@section('links')
    <link rel="stylesheet" href="{{asset("css/login.css")}}">
@endsection
@section('content')   
    <section class="login-content">
        @isset($_SESSION['alert'])
            <div class="alert alert-danger">You must connect first !</div>
        @endisset
        <div class="login-svg switch">
            <div class="svg"></div>
        </div>
        <div class="login-form d-center switch">
            <form action="{{ route('onway.login') }}" method="post">
                @csrf
                <div class="login-form-picture d-center">
                    <img src="{{asset("pictures/pic-1.jpg")}}" alt="image...">
                </div>
                <h1 class="m-2">Happy To See You Again!</h1>
                <div class="p-3">
                    <div class="input-group-lg input-group flex-nowrap m-2">
                        <input  class="form-control" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus autocomplete="username"  />
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-person"></i></span>
                    </div>
                    @error('email')
                       <div class="row g-3">
                            <div class="col-md-12">
                                <span class="text-danger"> {{$message}}</span>
                            </div>   
                        </div>
                    @enderror
                    <div class="input-group-lg input-group flex-nowrap m-2">
                        <input  class="form-control"  placeholder="Password" type="password" name="password" required autocomplete="current-password">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-eye-slash"></i></span>
                    </div>
                    @error('password')
                       <div class="row g-3">
                            <div class="col-md-12">
                                <span class="text-danger"> {{$message}}</span>
                            </div>   
                        </div>
                    @enderror
                </div>
                <h5 class="text-center">or</h5>
                <p class="text-center">You do not have an account ? <a href="{{route('onway.register')}}">Register</a></p>
                <button type="submit" class="btn btn-success">Log in <i class="bi bi-box-arrow-right"></i></button>
            </form>
        </div>
        <div class="footer switch">
            <div class="footer-links">
                <div class="footer-link"><a href="#">About Us</a></div>
                <div class="footer-link"><a href="#">Contact Us</a></div>
                <div class="footer-link"><a href="#">Confidentiality & Policies</a></div>
                <div class="footer-link"><a href="#">Help</a></div>
            </div>
            <div class="footer-down">
                <div class="footer-social-link">
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                </div>
                <div class="copyright">
                    @ {{date('Y')}} OnWay
                </div>
            </div>
        </div>
    </section>
@endsection