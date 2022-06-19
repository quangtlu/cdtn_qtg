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
                    <a class="col-md-1 btn btn-success btn-sm float-right m-2" href="{{ route('admin.owners.create') }}">Thêm</a>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên chủ sơ hữu</th>
                                <th>Email</th>
                                <th>Phone</th>
                                {{-- @can('add owner | edit owner') --}}
                                <th>Action</th>
                                {{-- @endcan --}}
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
                                            {{-- @can('edit owner') --}}
                                            <a href="{{ route('admin.owners.edit', ["id" => $owner->id]) }}"><button class="btn btn-info btn-sm">Sửa</button></a>
                                            {{-- @endcan --}}
                                            {{-- @can('delete owner') --}}
                                            <a href="{{ route('admin.owners.destroy', ["id" => $owner->id]) }}"><button class="btn btn-danger btn-sm">Xóa</button></a>
                                            {{-- @endcan --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $owners->withQueryString()->links() }}
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
        $('#header-search-form').attr('action', '{{ route('admin.owners.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm chủ sở hữu, email, số điện thoại...');
    </script>
@endsection