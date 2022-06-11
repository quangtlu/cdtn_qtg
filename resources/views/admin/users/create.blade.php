@extends('layouts.admin')

@section('title', 'Thêm mới người dùng')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
    <link rel="stylesheet" href="{{ asset('css/avatar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.admin.content_header', [
            'name' => 'Người dùng',
            'key' => 'Thêm mới',
        ])
        <div class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Họ và tên <b class="field-require">*</b></label>
                                <input type="text" name="name" class="form-control">
                                @error('name')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ngày sinh</label>
                                <input type="text" data-date-format='yyyy-mm-dd' class="form-control" name="dob" value="" id="dob" placeholder="yyyy-mm-dd">
                                @error('dob')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Giới tính</label>
                                <select name="gender" class="form-control" id="gender">
                                    <option value=""></option>
                                    <option value="nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Số điện thoại<b class="field-require">*</b></label>
                                <input type="text" name="phone" class="form-control">
                                @error('phone')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Email<b class="field-require">*</b></label>
                                <input type="email" name="email" class="form-control">
                                @error('email')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Mật khẩu<b class="field-require">*</b></label>
                                <input id="password" data-toggle="password" type="password" name="password"
                                    class="form-control">
                                @error('password')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Vai trò</label>
                                <select name="roleNames[]" class="form-control select2_init" multiple>
                                    <option></option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('roleNames')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Thêm mới</button>
                        </div>
                        <div class="col-md-6" >
                            <div class="avatar-header mt-4">
                                <div class="avatar-wrapper mt-5" title="Ảnh đại diện">
                                    <img class="profile-pic" src="{{ asset('image/profile/register.png') }}" />
                                    <div class="upload-button">
                                        <i class="fa fa-camera camera-icon" aria-hidden="true"></i>
                                    </div>
                                    <input class="file-upload" name="image" type="file" accept="image/*" />
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
    <script src="{{ asset('admin/user/create.js') }}"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script src="{{ asset('js/avatar.js') }}"></script>
    <script src="{{ asset('js/datepicker.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.vi.min.js') }}"></script>
    <script>
        $('#dob').datepicker({
            language: 'vi',
            orientation: 'bottom',
            dateFormat: "Y-m-d",
        });
    </script>
@endsection

