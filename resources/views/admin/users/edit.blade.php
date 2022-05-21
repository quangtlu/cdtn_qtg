@extends('layouts.admin')
@section('title', 'Sửa thông tin người dùng')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'Người dùng', 'key' => 'Sửa thông tin'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.users.update', ["id" => $user->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Họ và tên</label>
                                <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Số điện thoại</label>
                                <input value="{{ $user->phone }}" type="text" name="phone" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Email</label>
                                <input value="{{ $user->email }}" type="email" name="email" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Mật khẩu</label>
                                <input type="password" name="password" class="form-control" id="category_name">
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
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('admin/user/create.js') }}"></script>
@endsection
