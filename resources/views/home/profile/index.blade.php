@extends('layouts.home')
@section('title', 'Thông tin tài khoản')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/profile/index.css') }}">
    <style>
        .profile-info {
            margin-top: 15px;
        }
        .mt-2 {
            margin-top: 15px;
        }
        .my-3 {
            margin: 6px 0;
        }
        .btn-edit{
            margin-top: 32px;
        }
    </style>
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 ml-3">
                    <div class="mt-4">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img class="avata-img mt-5" src="{{ asset("image/profile/$profile->image") }}">
                            <span class="text-black-50 mt-3">
                                <h4>Ảnh đại diện</h4>
                            </span>
                            {{-- <span> </span> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 profile-info">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-center">Thông tin tài khoản</h4>
                        </div>
                        <div class="mt-2">
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
                            <a href="{{ route('admin.profile.edit', ['id' => $profile->id]) }}">
                                <button class="btn btn-info">Sửa</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
