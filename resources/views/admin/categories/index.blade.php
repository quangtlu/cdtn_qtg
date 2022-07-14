@extends('layouts.admin')
@section('title', 'Quản lý danh mục')
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
                                        href="{{ route('admin.users.create') }}">Thêm mới</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 card">
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