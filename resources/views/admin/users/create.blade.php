@extends('layouts.admin')

@section('title', 'Thêm mới người dùng')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'Người dùng', 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Họ và tên</label>
                                <input type="text" name="name" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Email</label>
                                <input type="email" name="email" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Mật khẩu</label>
                                <input type="password" name="password" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label>Vai trò</label>
                                <select name="role_id[]" class="form-control select2_init" multiple>
                                    <option></option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
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
