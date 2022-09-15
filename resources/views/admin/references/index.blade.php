@extends('layouts.admin')
@section('title', 'Quản lý tài liệu tham khảo')
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
                                        href="{{ route('admin.references.create') }}">Thêm mới</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 card">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tiêu đề</th>
                                    <th>Đường dẫn</th>
                                    <th>Mô tả</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($references as $refernce)
                                    <tr>
                                        <td>{{ $refernce->id }}</td>
                                        <td>{{ $refernce->title }}</td>
                                        <td><a href="{{ $refernce->url }}">{{ $refernce->url }}</a></td>
                                        <td>{{ $refernce->description }}</td>
                                        <td>
                                            <a href="{{ route('admin.references.edit', ['id' => $refernce->id]) }}"><button
                                                    class="btn btn-info btn-sm">Sửa</button></a>
                                            <button type="button"
                                                data-url="{{ route('admin.references.destroy', ['id' => $refernce->id]) }}"
                                                class="btn btn-danger btn-sm btn-delete">Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $references->withQueryString()->links() }}
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
        $('#header-search-form').attr('action', '{{ route('admin.references.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm tài liệu...');
    </script>
@endsection
