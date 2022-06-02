@extends('layouts.admin')
@section('title', 'Quản lý chủ sở hữu')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.admin.content_header', ['name' => 'Chủ sở hữu', 'key' => 'Danh sách'])
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
                                <th>Tên danh mục</th>
                                <th>Danh mục cha</th>
                                {{-- @can('add owner | edit owner') --}}
                                <th>Action</th>
                                {{-- @endcan --}}
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->parent_id }}</td>
                                        <td>
                                            {{-- @can('edit owner') --}}
                                            <a href="{{ route('admin.categories.edit', ["id" => $category->id]) }}"><button class="btn btn-info btn-sm">Sửa</button></a>
                                            {{-- @endcan --}}
                                            {{-- @can('delete owner') --}}
                                            <a href="{{ route('admin.categories.destroy', ["id" => $category->id]) }}"><button class="btn btn-danger btn-sm">Xóa</button></a>
                                            {{-- @endcan --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('admin.categories.create') }}"><button class="btn btn-success float-right m-2">Thêm mới</button></a>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
