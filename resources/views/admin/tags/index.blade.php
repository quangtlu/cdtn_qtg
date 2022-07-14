@extends('layouts.admin')
@section('title', 'Quản lý tag')
@section('css')
@endsection
@section('js')
    <script src="{{ asset('admin/role/create.js') }}"></script>
    <script>
        $('#header-search-form').attr('action', '{{ route('admin.tags.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm tag, ID...');
    </script>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <form action="{{ route('admin.tags.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên tag</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- @can('admin add permission') --}}
                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                            {{-- @endcan --}}
                        </form>
                    </div>
                    <div class="col-md-6">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên tag</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>
                                            <input id="tag-name" class="form-control" value="{{ $tag->name }}" name="name" disabled="true" type="text">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.tags.edit', ["id" => $tag->id]) }}"><button type="button" id="btn_edit" checked="checked" class="btn btn-info btn-sm">Sửa</button></a>
                                            <button type="button" data-url="{{ route('admin.tags.destroy', ["id" => $tag->id]) }}" class="btn btn-danger btn-sm btn-delete">Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $tags->withQueryString()->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

