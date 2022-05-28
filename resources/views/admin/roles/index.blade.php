@extends('layouts.admin')
@section('title', 'Quản lý vai trò')
@section('js')
    <script src="{{ asset('js/alert.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content_header', ['name' => 'vai trò', 'key' => 'Danh sách'])
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
                                <th>Tên vai trò</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.roles.edit', ["id" => $role->id]) }}"><button class="btn btn-info btn-sm">Sửa</button></a>
                                            <button type="button" data-url="{{ route('admin.roles.destroy', ["id" => $role->id]) }}" class="btn btn-danger btn-sm btn-delete">Xóa</button>
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
