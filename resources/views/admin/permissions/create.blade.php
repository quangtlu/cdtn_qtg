@extends('layouts.admin')
@section('title', 'Thêm mới quyền')
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
        @include('partials.content_header', ['name' => 'quyền', 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.permissions.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Chọn module</label>
                                <select name="module_parents" id="" class="form-control">
                                    @foreach (config('permissions.module_parents') as $moduleItem)
                                        <option value="{{ $moduleItem }}">{{ $moduleItem }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
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
                                    @foreach (config('permissions.module_children') as $moduleItem)
                                        <div class="col-md-3">
                                            <label>
                                                <input type="checkbox" class="checkbox-children" name="module_children[]" value="{{ $moduleItem }}">
                                                {{ $moduleItem }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
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
