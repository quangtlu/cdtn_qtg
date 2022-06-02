@extends('layouts.admin')
@section('title', 'Thông tin cá nhân')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/profile/index.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.admin.content_header', ['name' => 'Cá nhân', 'key' => 'Thông tin '])
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5 border-right">
                        <div class="p-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Thông tin tài khoản</h4>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Họ tên: {{ $profile->name }}</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Giới tính: {{ $profile->gender }}</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Ngày sinh: {{ $profile->dob }}</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Email: {{ $profile->email }}</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Điện thoại: {{ $profile->phone }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 text-center">
                            <a href="{{ route('admin.profile.edit', ["id" => $profile->id ]) }}">
                                <button class="btn btn-info">Sửa</button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="">
                            <div class="d-flex flex-column align-items-center text-center">
                                @if (empty($profile->image)) 
                                    <img class="rounded-circle mt-5" width="150px" src="{{ asset("image/profile/user.jpg") }}" alt="">                                    
                                @else
                                    <img class="rounded-circle mt-5" width="150px" src="{{ asset("image/profile/$profile->image") }}">
                                @endif
                                <span class="font-weight-bold">{{ $profile->name }}</span>
                                <span class="text-black-50">{{ $profile->email }}</span>
                                {{-- <span> </span> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
