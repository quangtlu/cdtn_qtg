@extends('layouts.admin')
@section('title', 'Cập nhật vai trò')
@section('css')
    <style>
        input[type="checkbox"] {
            transform: scale(1.3)
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('admin/role/edit.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'vai trò', 'key' => 'cập nhật'])
        <div class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.roles.update', ['id' => $role->id]) }}" method="POST" style="width: 100%">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category_name">Tên vai trò</label>
                                <input value="{{ $role->name }}" type="text" name="name" class="form-control" id="category_name">
                                @error('name')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
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
                                <div class="card border-primary col-md-12">
                                    <div class="card-header bg-success">
                                        <label>
                                            Danh sách quyền
                                        </label>
                                    </div>
                                    @error('permissionNames')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="row">
                                        @foreach ($permissions as $permission)
                                            <div class="card-body text-primary col-md-3">
                                                <h5 class="card-title">
                                                    <label>
                                                        <input {{ $permissionsSelected->contains($permission) ? 'checked' : '' }}
                                                            class="checkbox-children" name="permissionNames[]" type="checkbox" value="{{ $permission->name}}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </h5>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
