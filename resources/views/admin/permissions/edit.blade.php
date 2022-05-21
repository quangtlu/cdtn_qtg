@extends('layouts.admin')
@section('title', 'Thêm mới quyền')
@section('content')
    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'quyền', 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.permissions.update', ['id' => $permission->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên quyền</label>
                                <input value="{{ $permission->name }}" type="text" name="name" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Mô tả</label>
                                <textarea value="{{ $permission->description }}" class="form-control" name="description" id="" cols="30" rows="10">{{ $permission->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
