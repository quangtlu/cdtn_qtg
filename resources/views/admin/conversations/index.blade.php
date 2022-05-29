@extends('layouts.admin')
@section('title', 'Quản lý hội thoai')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.admin.content_header', ['name' => 'Hội thoại', 'key' => 'Danh sách'])
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
                                <th>Tên</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($conversations as $conversation)
                                    <tr>
                                        <td>{{ $conversation->id }}</td>
                                        <td>Cuộc hội thoại 1</td>
                                        <td>
                                            <a href="{{ route('admin.conversations.edit', ["id" => $conversations->id]) }}"><button class="btn btn-info btn-sm">Sửa</button></a>
                                            <a href="{{ route('admin.conversations.destroy', ["id" => $conversations->id]) }}"><button class="btn btn-danger btn-sm">Xóa</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $conversations->links() }}
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('admin.conversations.create') }}"><button class="btn btn-success float-right m-2">Thêm mới</button></a>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
