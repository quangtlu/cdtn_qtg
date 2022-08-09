@extends('layouts.one-column')
@section('title', 'Thông tin tài khoản')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/profile/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/avatar.css') }}">
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
    <style>
        .my-3 {
            margin: 6px 0;
        }

        .labels {
            font-size: x-large;
            font-weight: 400;
        }

        .border-right {
            border-right: 1px solid #b2c2d2;
        }

        .form-control {
            font-size: 19px
        }

        .profile-content {
            margin-top: 50px;
        }
    </style>
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <form action="{{ route('profile.update', ['id' => $profile->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-center" style="font-size: xx-large">Thông tin tài khoản</h4>
                </div>
                <div class="row profile-content">
                    <div class="col-md-6 border-right">
                        <div class="p-3">
                            <div class="">
                                <div class="row my-3">
                                    <div class="col-md-12">
                                        <label class="labels label-required">Họ tên:</label>
                                        <input type="text" value="{{ $profile->name }}" name="name"
                                            class="form-control">
                                        @error('name')
                                            <span class="mt-1 text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-12">
                                        <label class="labels label-required">Giới tính:</label>
                                        <select name="gender" class="form-control" id="gender">
                                            <option value=""></option>
                                            @foreach (config('consts.user.gender') as $gender)
                                                <option
                                                    {{ old('gender') == $gender['value'] || $profile->gender == $gender['value'] ? 'selected' : '' }}
                                                    value="{{ $gender['value'] }}">{{ $gender['name'] }}</option>
                                            @endforeach
                                            @error('gender')
                                                <span class="mt-1 text-danger">{{ $message }}</span>
                                            @enderror
                                        </select>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-12">
                                        <label class="labels">Ngày sinh:</label>
                                        <input type="datetime-local" placeholder="yyyy-mm-dd" value="{{ $profile->dob }}"
                                            name="dob" class="form-control" style="background-color: #fff">
                                        @error('dob')
                                            <span class="mt-1 text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-12">
                                        <label class="labels label-required">Email:</label>
                                        <input type="text" value="{{ $profile->email }}" name="email"
                                            class="form-control">
                                        @error('email')
                                            <span class="mt-1 text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-12">
                                        <label class="labels label-required">Điện thoại:</label>
                                        <input type="text" value="{{ $profile->phone }}" name="phone"
                                            class="form-control">
                                        @error('phone')
                                            <span class="mt-1 text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-12">
                                        <label class="labels">Password</label>
                                        <input id="password" data-toggle="password" type="password" name="password"
                                            class="form-control">
                                        @error('password')
                                            <span class="mt-1 text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ml-3">
                        <div class="mt-3" style="margin-top: 40px">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="avatar-header">
                                    <div class="avatar-wrapper" title="Ảnh đại diện">
                                        <img class="profile-pic avata-img mt-5"
                                            src="
                                            @if ($profile->image) {{ asset('image/profile/' . $profile->image) }} @endif " />
                                        <div class="upload-button">
                                            <i class="fas fa-camera camera-icon" aria-hidden="true"></i>
                                        </div>
                                        <input class="file-upload" name="image" type="file" accept="image/*" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @role('counselor')
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="labels">Chuyên mục:</label>
                                    <select name="category_id[]" class="form-control select2_init" multiple>
                                        <option></option>
                                        @foreach ($categories as $category)
                                            <option {{ $profile->categories->contains($category->id) ? 'selected' : '' }}
                                                value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endrole
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div class="text-center">
                        <a href="{{ route('profile.edit', ['id' => $profile->id]) }}">
                            <button class="btn btn-primary profile-button " type="submit">Cập nhật</button>
                        </a>
                    </div>
                </div>
            </form>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('js')
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/avatar.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.select2_init').select2()
    </script>
    <script>
        flatpickr("input[type=datetime-local]", {});
    </script>
@endsection
