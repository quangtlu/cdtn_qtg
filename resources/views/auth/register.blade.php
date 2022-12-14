@extends('layouts.signin_signup')
@section('title', 'Đăng ký')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/avatar.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
    <!-- register -->
    <form method="POST" action="{{ route('register') }}" class="register-form animate__animated animate__fadeInDown" enctype="multipart/form-data">
        @csrf
        <div class="register">
            <div class="avatar-header" title="Ảnh đại diện">
                <div class="avatar-wrapper">
                    <img class="profile-pic" src=""/>
                    <div class="upload-button">
                        <i class="fas fa-camera icon-register" aria-hidden="true"></i>
                    </div>
                    <input class="file-upload" name="image" type="file" accept="image/*"/>
                </div>
            </div>
            <fieldset>
                <div class="form">
                    <div class="form-row">
                        <span class="fas fa-user"></span>
                        <label class="form-label label-required" for="input">Họ tên</label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-text">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <span class="fas fa-venus-mars"></span>
                        <label class="form-label label-required" for="input">Giới tính</label>
                        <select name="gender" class="form-text" id="gender">
                            <option value=""></option>
                            @foreach (config('consts.user.gender') as $gender)
                                <option {{ (old('gender') == $gender['value']) ? 'selected' : '' }}
                                value="{{ $gender['value']  }}">{{$gender['name'] }}</option>
                            @endforeach
                        </select>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <span class="fas fa-calendar-alt"></span>
                        <label class="form-label" for="input">Ngày sinh</label>
                        <input type="datetime-local" data-date-format='d/m/Y'  name="dob" class="form-text" style="background-color: #fff" @error('dob') is-invalid @enderror" value="{{ old('dob') }}">
                        @error('dob')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <span class="fas fa-envelope"></span>
                        <label class="form-label label-required" for="input">E-mail</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-text" @error('email') is-invalid @enderror">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                           {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <span class="fas fa-mobile-alt"></span>
                        <label class="form-label label-required" for="input">Số điện thoại</label>
                        <input type="phone" name="phone" value="{{ old('phone') }}" class="form-text" @error('phone') is-invalid @enderror">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <span title="Hiển thị mật khẩu" id="show-pass-icon" class="fas fa-eye"></span>
                        <label class="form-label label-required" for="input">Mật khẩu</label>
                        <input id="input-password" value="{{ old('password') }}" type="password" name="password"
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
        </div>
    </form>

    <!-- //register -->
@endsection
@section('js')
    <script src="{{ asset('js/avatar.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("input[type=datetime-local]",{});
    </script>
@endsection
