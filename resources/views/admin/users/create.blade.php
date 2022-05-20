@extends('layouts.admin')
@section('title', 'Thêm mới người dùng')
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
                                <label for="category_name">Nhóm quyền</label>
                                <select name="role_id" class="form-control" id="category_name">
                                    <option value="1">Admin</option>
                                    <option value="2">Người dùng</option>
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
