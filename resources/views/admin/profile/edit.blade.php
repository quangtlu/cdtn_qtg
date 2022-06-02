@extends('layouts.admin')
@section('title', 'Quản lý tác giả')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/profile/index.css') }}">

@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.admin.content_header', ['name' => 'Tác giả', 'key' => 'Danh sách'])
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.profile.update', ["id" => $profile->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-5 border-right">
                            <div class="p-3 form-profile">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Profile</h4>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">Họ tên</label>
                                        <input type="text" value="{{ $profile->name }}" name="name" class="form-control" >
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">Ngày sinh</label>
                                        <input type="date" value="{{ $profile->dob }}" name="dob" class="form-control" >
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">Email</label>
                                        <input type="text" value="{{ $profile->email }}" name="email" class="form-control" >
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">Điện thoại</label>
                                        <input type="text" value="{{ $profile->phone }}" name="phone" class="form-control" >
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">Password</label>
                                        <input id="password" data-toggle="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 text-center">
                                <button class="btn btn-primary profile-button " type="submit">Cập nhật</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <div class="d-flex flex-column align-items-center text-center">
                                    @if ($profile->image != null)
                                        <img id="avt-img" data-img_url = '{{ asset("image/profile") }}'  class="rounded-circle mt-5" width="150px" src="{{ asset("image/profile/$profile->image") }}" alt="">
                                    @else
                                        <img id="avt-img" data-img_url = '{{ asset("image/profile") }}' class="rounded-circle mt-5" width="150px" src="{{ asset("image/profile/user.jpg") }}" alt="">
                                    @endif
                                    <input type="file" id="profile_pic" value="" name="image" accept=".jpg, .jpeg, .png">
                                    {{-- <span> </span> --}}
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
@section('js')
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script>
        $('#profile_pic').on('change', function(){
            var file = $(this)[0].files[0].mozFullPath
            $('#avt-img').attr('src', file)
        })
    </script>
@endsection
