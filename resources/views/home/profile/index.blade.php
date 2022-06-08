@extends('layouts.home')
@section('title', 'Thông tin tài khoản')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/profile/index.css') }}">
    <style>
        .my-3 {
            margin: 6px 0;
        }
        .btn-edit{
            margin-top: 32px;
        }
        .labels {
            font-size: x-large;
            font-weight: 400;
        }
        .image-border{
            border-left: 1px solid #b2c2d2;
        }
        .profile-content{
            margin-top: 50px;
        }
    </style>
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-center" style="font-size: xx-large">Thông tin tài khoản</h4>
            </div>
            <div class="row profile-content">
                <div class="col-md-6 border-right">
                    <div class="p-3">
                        <div class="">
                            <div class="row my-3">
                                <div class="col-md-12">
                                    <label class="labels">Họ tên: {{ $profile->name }}</label>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-12">
                                    <label class="labels">Giới tính: {{ $profile->gender }}</label>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-12">
                                    <label class="labels">Ngày sinh: {{ $profile->dob }}</label>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-12">
                                    <label class="labels">Email: {{ $profile->email }}</label>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-12">
                                    <label class="labels">Điện thoại: {{ $profile->phone }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row btn-edit">
                        <div class="text-center">
                            <a href="{{ route('profile.edit', ['id' => $profile->id]) }}">
                                <button class="btn btn-info">Sửa</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ml-3 image-border">
                    <div class="mt-3">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img class="avata-img mt-5" src="{{ asset("image/profile/$profile->image") }}">
                            <span class="text-black-50 mt-2">
                                <h4 >Ảnh đại diện</h4>
                            </span>
                            {{-- <span> </span> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
