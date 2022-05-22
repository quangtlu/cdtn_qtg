@extends('layouts.admin')
@section('title', 'Thêm mới vai trò')
@section('css')
    <style>
        input[type="checkbox"] {
            transform: scale(1.3)
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('admin/role/create.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'vai trò', 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.roles.store') }}" method="POST" style="width: 100%">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category_name">Tên vai trò</label>
                                <input type="text" name="name" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Mô tả</label>
                                <textarea class="form-control" name="display_name" id="" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>
                                                <input type="checkbox" class="checkall">
                                                Chọn tất cả
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($permissionParents as $permissionParent)
                                    <div class="card border-primary col-md-12">
                                        <div class="card-header bg-success">
                                            <label>
                                                <input type="checkbox" class="checkbox-wrapper" value="">
                                            </label>
                                            {{ $permissionParent->name }}
                                        </div>
                                        <div class="row">
                                            @foreach ($permissionParent->permissionChildren as $permissionChildren)
                                                <div class="card-body text-primary col-md-3">
                                                    <h5 class="card-title">
                                                    <label>
                                                        <input class="checkbox-children" name="permission_id[]" type="checkbox" value="{{ $permissionChildren->id }}">
                                                    </label>
                                                    {{ $permissionChildren->name }}
                                                    </h5>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </form>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
