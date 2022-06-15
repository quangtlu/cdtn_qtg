@extends('layouts.admin')
@section('title', 'Sửa thông tin người dùng')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
    <link rel="stylesheet" href="{{ asset('css/avatar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.admin.content_header', ['name' => 'Người dùng', 'key' => 'Sửa thông tin',])
        <div class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.users.update', ["id" => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Họ và tên <b class="field-require">*</b></label>
                                <input type="text" value="{{ $user->name }}" name="name" class="form-control">
                                @error('name')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ngày sinh</label>
                                <input type="text" data-date-format='yyyy-mm-dd' class="form-control" name="dob" value="{{ old('dob') ?? $user->dob }}" id="dob" placeholder="yyyy-mm-dd">
                                @error('dob')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Giới tính</label>
                                <select name="gender" id="" class="form-control">
                                    @if ($user->gender == 'nam')
                                        <option value="nam" selected>Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    @else
                                        <option value="nam">Nam</option>
                                        <option value="Nữ" selected>Nữ</option>
                                    @endif
                                </select>
                                @error('gender')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Số điện thoại <b class="field-require">*</b></label>
                                <input value="{{ $user->phone }}" type="text" name="phone" class="form-control" >
                                @error('phone')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Email <b class="field-require">*</b></label>
                                <input value="{{ $user->email }}" type="email" name="email" class="form-control" >
                                @error('email')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Mật khẩu <b class="field-require">*</b></label>
                                <input id="password" data-toggle="password" type="password" name="password" class="form-control">
                                @error('password')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Nhóm quyền</label>
                                <select name="role_id[]" class="form-control select2_init" multiple>
                                    <option></option>
                                    @foreach ($roles as $role)
                                        <option
                                        {{ $roleOfUsers->contains('id', $role->id) ? 'selected' : '' }}
                                        value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('roleNames')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Cập nhật</button>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="avatar-header mt-4">
                                        <div class="avatar-wrapper mt-5" title="Ảnh đại diện">
                                            <img class="profile-pic" src="
                                            @if ($user->image)
                                                {{ asset('image/profile/'.$user->image)}}
                                            @endif "/>
                                            <div class="upload-button">
                                                <i class="fas fa-camera camera-icon" aria-hidden="true"></i>
                                            </div>
                                            <input class="file-upload" name="image" type="file" accept="image/*"/>
                                        </div>
                                    </div>
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
    <script src="{{ asset('js/avatar.js') }}"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script src="{{ asset('js/datepicker.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.vi.min.js') }}"></script>
    <script>
        $('#dob').datepicker({
            language: 'vi',
            orientation: 'bottom',
        });
    </script>
@endsection
