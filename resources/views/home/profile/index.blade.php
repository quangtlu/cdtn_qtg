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
        .avata-img {
            border: 1px solid #ffac3a;
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
                                    <label class="labels">Giới tính:
                                        @foreach (config('consts.user.gender') as $gender)
                                            @if ($gender['value'] == $profile->gender)
                                                {{ $gender['name'] }}
                                            @endif
                                        @endforeach
                                    </label>
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
                            @role('counselor')
                                <div class="row my-3">
                                    <div class="col-md-12">
                                        <ul id="category" class="tag" style="margin-top: 0 !important">
                                            <label class="labels">Chuyên mục:</label>
                                            @foreach ($profile->categories as $category)
                                                <li class="li-category-tag">
                                                    <a class="m-3" href="{{ route('posts.getPostByCategory', ['id' => $category->id]) }}">{{ $category->name ?? 'Chưa rõ' }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endrole
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ml-3 image-border">
                    <div class="mt-3">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img class="avata-img mt-5" src="{{ asset("image/profile/$profile->image") }}">
                            <h4 style="margin-top: 24px !important">Ảnh đại diện</h4>
                            {{-- <span> </span> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row btn-edit">
                <div class="text-center">
                    <a href="{{ route('profile.edit', ['id' => $profile->id]) }}">
                        <button class="btn btn-info">Chỉnh sửa</button>
                    </a>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

