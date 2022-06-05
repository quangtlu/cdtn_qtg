@extends('layouts.admin')
@section('title', 'Sửa thông tin tác giả')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.admin.content_header', ['name' => 'Tác giả', 'key' => 'Sửa thông tin'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.authors.update', ["id" => $author->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Họ và tên</label>
                                <input type="text" value="{{ $author->name }}" name="name" class="form-control" >
                                @error('name')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Số điện thoại</label>
                                <input value="{{ $author->dob }}" type="datetime-local"  placeholder="yyyy-mm-dd" name="dob" class="form-control" style="background-color: #fff">
                                @error('dob')
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
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("input[type=datetime-local]",{});
    </script>
@endsection