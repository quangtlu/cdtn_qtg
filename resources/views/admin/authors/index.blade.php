@extends('layouts.admin')
@section('title', 'Quản lý tác giả')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.admin.content_header', ['name' => 'Tác giả', 'key' => 'Danh sách'])
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
                                <th>Họ tên</th>
                                <th>Ngày sinh</th>
                                @can('admin edit author' | 'admin delete author')
                                <th>Action</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($authors as $author)
                                    <tr>
                                        <td>{{ $author->id }}</td>
                                        <td>{{ $author->name }}</td>
                                        <td>{{ $author->dob }}</td>
                                        <td>
                                            @can('admin edit author')
                                            <a href="{{ route('admin.authors.edit', ["id" => $author->id]) }}"><button class="btn btn-info btn-sm">Sửa</button></a>
                                                @can('admin delete author')
                                            <button type="button" data-url="{{ route('admin.authors.destroy', ["id" => $author->id]) }}" class="btn btn-danger btn-sm btn-delete">Xóa</button>@endcan
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $authors->links() }}
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('admin.authors.create') }}"><button class="btn btn-success float-right m-2">Thêm mới</button></a>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
