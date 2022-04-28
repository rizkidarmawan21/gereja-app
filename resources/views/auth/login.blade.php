@extends('layouts.auth')
@section('title')
Login
@endsection
@section('content')
<main>
    <div class="login-container">
        <div class="container">
            <div class="row page-login d-flex align-items-center">
                <div class="section-left col-12 col-md-5 col-lg-6">
                    <h1 class="mb-4">Login Untuk Anggota <br> Gereja</h1>
                    <img src="frondend/images/image-login.jpg" width="400" class=" d-none d-sm-flex" alt="">
                </div>
                <div class="section-right col-12 col-md-7 col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="frondend/images/logo.png" class="w-20 mb-4" alt="">
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-login btn-block">Login</button>
                                </div>
                                {{-- <p class="text-center">
                                    <a href="#">Lupa Password ?</a>
                                </p> --}}
                                <p class="text-center">
                                    <a href="{{ route('register') }}">Daftar Anggota Jemaat ?</a>
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection