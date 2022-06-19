@extends('layouts.admin')
@section('title', 'Quản lý danh mục')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.admin.content_header', ['name' => 'Danh mục', 'key' => 'Danh sách'])
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <a class="col-md-1 btn btn-success btn-sm float-right m-2" href="{{ route('admin.categories.create') }}">Thêm</a>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th>Loại danh mục</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->type }}</td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit', ["id" => $category->id]) }}"><button class="btn btn-info btn-sm">Sửa</button></a>
                                            <button type="button" data-url="{{ route('admin.categories.destroy', ["id" => $category->id]) }}" class="btn btn-danger btn-sm btn-delete">Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->withQueryString()->links() }}
                    </div>
                    
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
@section('js')
    <script>
        $('#header-search-form').attr('action', '{{ route('admin.categories.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm danh muc, ID...');
    </script>
@endsection