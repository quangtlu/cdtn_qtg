@extends('layouts.admin')
@section('title', 'Quản lý người dùng')
@section('js')
    <script src="{{ asset('js/alert.js') }}"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/product/index.css')}}"/>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.admin.content_header', ['name' => 'Người dùng', 'key' => 'Danh sách'])
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
                                <th>Ảnh</th>
                                <th>Họ tên</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>
                                            <img class="avt-product index-avt" src=" {{ asset('image/profile/'.$user->image) }}" alt="">
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ $user->dob }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.edit', ["id" => $user->id]) }}"><button class="btn btn-info btn-sm">Sửa</button></a>
                                            <button type="button" data-url="{{ route('admin.users.destroy', ["id" => $user->id]) }}" class="btn btn-danger btn-sm btn-delete">Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('admin.users.create') }}"><button class="btn btn-success float-right m-2">Thêm mới</button></a>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
