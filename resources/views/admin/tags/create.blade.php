@extends('layouts.admin')
@section('title', 'Thêm mới tag')
@section('content')
    <div class="content-wrapper">
        @include('partials.admin.content_header', ['name' => 'Tag', 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.tags.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên tag</label>
                                <input type="text" name="name" class="form-control" >
                                @error('name')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
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
