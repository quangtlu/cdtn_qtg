@extends('layouts.admin')
@section('title', 'Quản lý bài viết')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('admin/product/index.css') }}" />
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <a class="col-md-1 btn btn-success btn-sm float-right m-2" href="{{ route('admin.chatrooms.create') }}">Thêm</a>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên phòng</th>
                                    <th>Mô tả</th>
                                    <th>Thành viên</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chatrooms as $chatroom)
                                    <tr>
                                        <td>{{ $chatroom->id }}</td>
                                        <td>{{ Str::ucfirst($chatroom->name) }}</td>
                                        <td>{{ $chatroom->description }}</td>
                                        <td>
                                            @foreach ($chatroom->users as $index => $user)
                                                {{ $index != count($chatroom->users) - 1 ? $user->name . ' - ' : $user->name }}
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.chatrooms.edit', ['id' => $chatroom->id]) }}"><button
                                                    class="btn btn-info btn-sm">Sửa</button></a>
                                            <button type="button"
                                                data-url="{{ route('admin.chatrooms.destroy', ['id' => $chatroom->id]) }}"
                                                class="btn btn-danger btn-sm btn-delete">Xoá</i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $chatrooms->withQueryString()->links() }}
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
        $('#header-search-form').attr('action', '{{ route('admin.chatrooms.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm phòng tư vấn');
    </script>
@endsection
