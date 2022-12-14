@extends('layouts.admin')
@section('title', 'Thêm mới người dùng')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/avatar.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label class="label-required" for="category_name">Họ và tên</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ngày sinh</label>
                                <input type="date" class="form-control" name="dob" value="{{ old('dob') }}" id="dob">
                                @error('dob')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-required" class="form-label">Giới tính</label>
                                <select name="gender" class="form-control" id="gender">
                                    <option value=""></option>
                                    @foreach (config('consts.user.gender') as $gender)
                                        <option {{ (old('gender') == $gender['value']) ? 'selected' : '' }}
                                        value="{{ $gender['value']  }}">{{$gender['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('gender')
                                    <span class="mt-2 text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-required" for="category_name">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-required" for="category_name">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                @error('email')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-required" for="category_name">Mật khẩu</label>
                                <input id="password" data-toggle="password" type="password" name="password"
                                    class="form-control" value="{{ old('password') }}">
                                @error('password')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Vai trò</label>
                                <select id="role-select" name="roleNames[]" class="form-control select2_init" multiple>
                                    <option></option>
                                    @foreach ($roles as $key => $role)
                                        <option value="{{ $role->name }}" {{ (collect(old('roleNames'))->contains($role->name)) ? 'selected':'' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('roleNames')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group" style="display: none" id="category-wrap">
                                <label>Mục lục</label>
                                <select name="" class="form-control select3_init" multiple>
                                    <option></option>
                                    @include('common.option-categories', ['categories' => $categories])
                                </select>
                                @error('category_id')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Thêm mới</button>
                        </div>
                        <div class="col-md-6">
                            <div class="avatar-header mt-4">
                                <div class="avatar-wrapper mt-5" title="Ảnh đại diện">
                                    <img class="profile-pic" src="{{ asset('image/profile/register.png') }}" />
                                    <div class="upload-button">
                                        <i class="fa fa-camera camera-icon" aria-hidden="true"></i>
                                    </div>
                                    <input class="file-upload" name="image" type="file" accept="image/*"/>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('admin/user/main.js') }}"></script>
    <script src="{{ asset('js/avatar.js') }}"></script>
@endsection
