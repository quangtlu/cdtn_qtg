@extends('layouts.admin')
@section('title', 'Quản lý chủ sở hữu')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content_header', ['name' => 'Chủ sở hữu', 'key' => 'Danh sách'])
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
                                <th>Tên chủ sơ hữu</th>
                                <th>Email</th>
                                <th>Phone</th>
                                @can('add owner | edit owner')
                                <th>Action</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($owners as $owner)
                                    <tr>
                                        <td>{{ $owner->id }}</td>
                                        <td>{{ $owner->name }}</td>
                                        <td>{{ $owner->email }}</td>
                                        <td>{{ $owner->phone }}</td>
                                        <td>
                                            @can('edit owner')
                                            <a href="{{ route('admin.owners.edit', ["id" => $owner->id]) }}"><button class="btn btn-info btn-sm">Sửa</button></a>
                                            @endcan
                                            @can('delete owner')
                                            <a href="{{ route('admin.owners.destroy', ["id" => $owner->id]) }}"><button class="btn btn-danger btn-sm">Xóa</button></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $owners->links() }}
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('admin.owners.create') }}"><button class="btn btn-success float-right m-2">Thêm mới</button></a>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
