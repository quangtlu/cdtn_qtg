@extends('layouts.admin')
@section('title', 'Quản lý người dùng')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content_header', ['name' => 'Người dùng', 'key' => 'Danh sách'])
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên nhóm quyền</th>
                                <th>Mô tả</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td>
                                            <a href="{{ route('admin.roles.edit', ["id" => $role->id]) }}"><button class="btn btn-info btn-sm">Sửa</button></a>
                                            <a href="{{ route('admin.roles.destroy', ["id" => $role->id]) }}"><button class="btn btn-danger btn-sm">Xóa</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $roles->links() }}
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('admin.roles.create') }}"><button class="btn btn-success float-right m-2">Thêm mới</button></a>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
