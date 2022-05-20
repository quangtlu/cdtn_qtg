@extends('layouts.admin')
@section('title', 'Sửa thông tin người dùng')
@section('content')
    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'Người dùng', 'key' => 'Sửa thông tin'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.users.update', ["id" => $user->id]) }}" method="POST">
                            @csrf
                            @method("PUT")
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
                                <input value="{{ $user->password }}" type="password" name="password" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Nhóm quyền</label>
                                <select name="role_id" class="form-control" id="category_name">
                                    @if ($user->role_id == 1)
                                        <option selected value="1">Admin</option>
                                        <option value="2">Người dùng</option>
                                    @else
                                        <option value="1">Admin</option>
                                        <option selected value="2">Người dùng</option>
                                    @endif
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
