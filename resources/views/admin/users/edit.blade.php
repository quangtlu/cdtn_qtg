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
        <div class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.users.update', ["id" => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Họ và tên <b class="field-require">*</b></label>
                                <input type="text" value="{{ old('name') ?? $user->name }}" name="name" class="form-control">
                                @error('name')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ngày sinh</label>
                                <input type="text" data-date-format='dd/mm/yyyy' class="form-control" name="dob" value="{{ old('dob') ?? $user->dob }}" id="dob" placeholder="dd/mm/yyyy">
                                @error('dob')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Giới tính</label>
                                <select name="gender" id="" class="form-control">
                                    @if ($user->gender == 'nam')
                                        <option {{ old('gender') == 'nam' ? 'selected' : '' }} selected value="nam">Nam</option>
                                        <option {{ old('gender') == 'nu' ? 'selected' : '' }}  value="nu">Nữ</option>
                                    @else
                                    <option {{ old('gender') == 'nam' ? 'selected' : '' }} value="nam">Nam</option>
                                    <option {{ old('gender') == 'nu' ? 'selected' : '' }}  selected value="nu">Nữ</option>
                                    @endif
                                </select>
                                @error('gender')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Số điện thoại <b class="field-require">*</b></label>
                                <input value="{{ old('phone') ?? $user->phone }}" type="text" name="phone" class="form-control" >
                                @error('phone')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Email <b class="field-require">*</b></label>
                                <input value="{{ old('email') ?? $user->email }}" type="email" name="email" class="form-control" >
                                @error('email')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Mật khẩu <b class="field-require">*</b></label>
                                <input id="password" data-toggle="password" type="password" name="password" class="form-control" value="{{ old('email') }}">
                                @error('password')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Vai trò</label>
                                <select id="role-select" name="role_id[]" class="form-control select2_init" multiple>
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
                            <div class="form-group" style="display: {{ $user->categories->count() ? 'block' : 'none' }}" id="category-wrap">
                                <label>Danh mục</label>
                                <select name="" class="form-control select3_init" multiple>
                                    <option></option>
                                    @foreach ($categories as $category)
                                        @if ($category->type === 'post')
                                            <option {{ $user->categories->contains('id', $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('category_id')
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
    <script src="{{ asset('js/avatar.js') }}"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script src="{{ asset('js/datepicker.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.vi.min.js') }}"></script>
    <script src="{{ asset('admin/user/main.js') }}"></script>
    <script>
        $('#dob').datepicker({
            language: 'vi',
            orientation: 'bottom',
        });
    </script>
@endsection
