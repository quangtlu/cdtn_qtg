@extends('layouts.admin')
@section('title', 'Quản lý quyền')
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
        @include('partials.admin.content_header', ['name' => 'quyền', 'key' => 'Quản lý'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 mt-4">
                        <form action="{{ route('admin.permissions.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Chọn module</label>
                                <select name="module_parents" id="" class="form-control">
                                    <option></option>
                                    @foreach (config('permission.module_parents') as $moduleItem)
                                        <option value="{{ $moduleItem }}">{{ $moduleItem }}</option>
                                    @endforeach
                                </select>
                                @error('module_parents')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>
                                                    Action
                                                </label>
                                            </div>
                                            <div class="col-md-12">
                                                <label>
                                                    <input type="checkbox" class="checkall">
                                                    Chọn tất cả
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach (config('permission.module_children') as $moduleItem)
                                        <div class="col-md-2">
                                            <label>
                                                <input type="checkbox" class="checkbox-children" name="module_children[]" value="{{ $moduleItem }}">
                                                {{ $moduleItem }}
                                            </label>
                                        </div>
                                    @endforeach
                                    @error('module_children')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @error('module_children'.' '.'module_parents')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @can('admin add permission')
                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                            @endcan
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="nav-item col-md-10" style="max-width:95%!important">
                            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                                <i class="fas fa-search"></i>
                            </a>
                            <div class="navbar-search-block">
                                <form class="form-inline" action="{{ route('admin.permissions.search') }}" method="GET">
                                    <div class="input-group input-group-sm">
                                        <input class="form-control form-control-navbar" name="keyword" required type="search"
                                            placeholder="Tìm kiếm quyền" aria-label="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-navbar" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên quyền</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->id }}</td>
                                            <td>
                                                <input class="form-control" value="{{ $permission->name }}" name="name" disabled type="text">
                                            </td>
                                            <td>
                                                <button type="button" data-url="{{ route('admin.permissions.destroy', ["id" => $permission->id]) }}" class="btn btn-danger btn-sm btn-delete">Xóa</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $permissions->withQueryString()->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

