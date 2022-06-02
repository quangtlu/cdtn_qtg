@extends('layouts.signin_signup')
@section('title', 'Đăng ký')
@section('content')
    <!-- register -->
    <div class="register">
        <span class="fas fa-user-circle"></span>
        <strong>Đăng ký tài khoản</strong>
        <form method="POST" action="{{ route('register') }}" class="register-form">
            @csrf
            <fieldset>
                <div class="form">
                    <div class="form-row">
                        <span class="fas fa-user"></span>
                        <label class="form-label" for="input">Họ tên</label>
                        <input type="text" name="name" class="form-text" @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <span class="fas fa-envelope"></span>
                        <label class="form-label" for="input">E-mail</label>
                        <input type="email" name="email" class="form-text" @error('email') is-invalid @enderror">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                           {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <span class="fas fa-mobile-alt"></span>
                        <label class="form-label" for="input">Số điện thoại</label>
                        <input type="phone" name="phone" class="form-text" @error('phone') is-invalid @enderror">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <span class="fas fa-calendar"></span>
                        <label class="form-label" for="input">Ngày sinh</label>
                        <input type="date" name="dob" class="form-text" @error('dob') is-invalid @enderror">
                        @error('dob')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <span title="Hiển thị mật khẩu" id="show-pass-icon" class="fas fa-eye"></span>
                        <label class="form-label" for="input">Mật khẩu</label>
                        <input id="input-password" type="password" name="password"
                               autocomplete="new-password" class="form-text" id="password" type="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                           {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-row button-login">
                        <button type="submit" class="btn btn-login">Đăng ký <span
                                class="fas fa-arrow-right"></span></button>
                    </div>
                    <div class="form-row button-login">
                        Bạn đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập tại đây</a>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
    <!-- //register -->
@endsection
