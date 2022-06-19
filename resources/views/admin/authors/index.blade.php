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
                    <a class="col-md-1 btn btn-success btn-sm float-right m-2" href="{{ route('admin.authors.create') }}">Thêm</a>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                {{-- @can('admin edit author' | 'admin delete author') --}}
                                <th>Action</th>
                                {{-- @endcan --}}
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($authors as $author)
                                    <tr>
                                        <td>{{ $author->id }}</td>
                                        <td>{{ $author->name }}</td>
                                        <td>{{ Str::ucfirst($author->gender) }}</td>
                                        <td>{{ $author->dob }}</td>
                                        <td>{{ $author->email }}</td>
                                        <td>{{ $author->phone }}</td>
                                        <td>
                                            {{-- @can('admin edit author') --}}
                                            <a href="{{ route('admin.authors.edit', ["id" => $author->id]) }}"><button class="btn btn-info btn-sm">Sửa</button></a>
                                                {{-- @can('admin delete author') --}}
                                            <button type="button" data-url="{{ route('admin.authors.destroy', ["id" => $author->id]) }}" class="btn btn-danger btn-sm btn-delete">Xóa</button>
                                                {{-- @endcan --}}
                                            {{-- @endcan --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $authors->withQueryString()->links() }}
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
        $('#header-search-form').attr('action', '{{ route('admin.authors.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm tên tác giả, email, giới tính, số điện thoại...');
    </script>
@endsection