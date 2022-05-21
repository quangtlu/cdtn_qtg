@extends('layouts.admin')
@section('title', 'Thêm mới nhóm quyền')
@section('content')
    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'nhóm quyền', 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.roles.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên nhóm quyền</label>
                                <input type="text" name="name" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Mô tả</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <h5>Quyền</h5>
                                 @foreach ($permissions as $permission)
                                    <label for="category_name">{{ $permission->name }}</label>
                                    <input type="checkbox" value="{{ $permission->id }}" name="permission_id[]" id="category_name">
                                 @endforeach
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
