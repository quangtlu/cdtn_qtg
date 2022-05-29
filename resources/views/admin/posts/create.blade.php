@extends('layouts.admin')
@section('title', 'Thêm mới bài viết')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.admin.content_header', ['name' => 'Bài viết', 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên bài viết</label>
                                <input type="text" name="title" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label>Tác giả: {{ Auth::user()->name }}</label>
                            </div>
                            <div class="form-group">
                                <label for="category_name">Mô tả</label>
                                <textarea class="form-control" name="content" id="summernote" cols="30" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ảnh</label>
                                <input type="file" multiple class="form-control-file" name="image[]" id="" cols="30" rows="5">
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
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.2/tinymce.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="{{ asset('admin/product/add.js') }}"></script>
    <script>
    $(function () {
        $('.select2_init').select2({
            'placeholder': 'Chọn tác giả'
        })
    })
    $('#summernote').summernote({
            height: 400
        });
    </script>
@endsection