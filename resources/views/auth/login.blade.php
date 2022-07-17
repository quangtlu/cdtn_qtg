@extends('layouts.signin_signup')
@section('title', 'Đăng nhập')
@section('content')
    <!-- login -->
    <div class="login animate__animated animate__fadeInDown">
        <img style="height: 150px" src="{{ asset('image/logo.gif') }}" alt="">
        <h3 style="color: #FF9F3A">Quang Vinh Copyright</h3>
        <form action="{{ route('login') }}" method="post" class="login-form">
            @csrf
            <fieldset>
                <div class="form">
                    <div class="form-row">
                        <span class="fas fa-envelope"></span>
                        <label class="form-label" for="input">Email</label>
                        <input type="email" name="email" class="form-text">
                    </div>
                    <div class="form-row">
                        <span title="Hiển thị mật khẩu" id="show-pass-icon" class="fas fa-eye"></span>
                        <label class="form-label" for="input">Mật khẩu</label>
                        <input id="input-password" type="password" name="password" class="form-text">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                           {{ $message }}
                        </span>
                        @enderror
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-row button-login">
                        <button type="submit" class="btn btn-login">Đăng nhập<span
                                class="fas fa-arrow-right"></span></button>
                    </div>
                    <div class="form-row button-login">
                        Bạn chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký tại đây</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <!-- //login -->
@endsection
