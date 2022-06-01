@extends('layouts.admin')
@section('title', 'Sửa thông tin tag')
@section('content')
    <div class="content-wrapper">
        @include('partials.admin.content_header', ['name' => 'Tag', 'key' => 'Sửa thông tin'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.tags.update', ["id" => $tag->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên tag</label>
                                <input type="text" value="{{ $tag->name }}" name="name" class="form-control" >
                                @error('name')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
