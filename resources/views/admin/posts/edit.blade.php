@extends('layouts.admin')
@section('title', 'Sửa thông tin bài viết')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.admin.content_header', ['name' => 'Bài viết', 'key' => 'Sửa thông tin'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.posts.update', ["id" => $post->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên bài viết</label>
                                <input type="text" value="{{ $post->title }}" name="title" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label>Tác giả: {{ Auth::user()->name }}</label>
                            </div>
                            <div class="form-group">
                                <label for="category_name">Mô tả</label>
                                <textarea class="form-control" value="{{ $post->content }}" name="content" id="summernote" cols="30" rows="5">{{ $post->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ảnh</label>
                                <input type="file" multiple class="form-control-file" name="image[]" id="" cols="30" rows="5" value="">
                                <img class="product-img" src="{{ asset("image/posts/$postImgs") }}" alt="">
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="{{ asset('admin/product/add.js') }}"></script>
    <script>
    $(function () {
        $('.select2_init').select2({
            'placeholder': 'Chọn tác giả'
        })
        $('#summernote').summernote({
            height: 400
        });
    })
    </script>
@endsection
