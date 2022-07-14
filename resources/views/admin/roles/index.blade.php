@extends('layouts.admin')
@section('title', 'Quản lý vai trò')
@section('js')
    <script src="{{ asset('js/alert.js') }}"></script>
    <script>
        $('#header-search-form').attr('action', '{{ route('admin.roles.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm tên vai trò');
    </script>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card w-100 mt-2">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div>
                                    <a class="btn btn-success btn-sm float-right"
                                        href="{{ route('admin.roles.create') }}">Thêm mới</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 card">
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
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
