@extends('layouts.admin')
@section('title', 'Quản lý thẻ bài viết')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.admin.content_header', ['name' => 'Thẻ bài viết', 'key' => 'Danh sách'])
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
                                <th>Tên tags</th>
                                {{-- @can('add owner | edit owner') --}}
                                <th>Action</th>
                                {{-- @endcan --}}
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->name }}</td>
                                        <td>
                                            {{-- @can('edit owner') --}}
                                            <a href="{{ route('admin.tags.edit', ["id" => $tag->id]) }}"><button class="btn btn-info btn-sm">Sửa</button></a>
                                            {{-- @endcan --}}
                                            {{-- @can('delete owner') --}}
                                            <a href="{{ route('admin.tags.destroy', ["id" => $tag->id]) }}"><button class="btn btn-danger btn-sm">Xóa</button></a>
                                            {{-- @endcan --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $tags->links() }}
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('admin.tags.create') }}"><button class="btn btn-success float-right m-2">Thêm mới</button></a>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
