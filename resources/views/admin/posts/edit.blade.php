@extends('layouts.admin')
@section('title', 'Sửa thông tin bài viết')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/product/index.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.posts.update', ['id' => $post->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên bài viết</label>
                                <input type="text" value="{{ $post->title }}" name="title" class="form-control"
                                    id="category_name">
                                @error('title')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Thẻ tag</label>
                                <select name="tag_id[]" class="form-control select2_init" multiple>
                                    <option></option>
                                    @foreach ($tags as $tag)
                                        <option {{ $postOfTags->contains('id', $tag->id) ? 'selected' : '' }}
                                            value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                @error('tag_id')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select name="category_id[]" class="form-control select3_init" multiple>
                                    <option></option>
                                    @foreach ($categories as $category)
                                        @if ($category->type === 'post')
                                            <option
                                                {{ $postOfCategories->contains('id', $category->id) ? 'selected' : '' }}
                                                value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Mô tả</label>
                                <textarea class="form-control" value="{{ $post->content }}" name="content" id="summernote" cols="30" rows="5">{{ $post->content }}</textarea>
                                @error('content')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ảnh</label>
                                <input type="file" accept="image/*" multiple class="form-control-file" name="image[]" id="" cols="30"
                                    rows="5" value="">
                                <div class="picture">
                                    <img class="product-img" src="{{ asset("image/posts/$postImgs") }}" alt="">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Cập nhật</button>
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
        $(function() {
            $('.select2_init').select2({
                'placeholder': 'Chọn thẻ tag'
            })
            $('.select3_init').select2({
                'placeholder': 'Chọn danh mục'
            })
            $('#summernote').summernote({
                height: 400
            });
        })
    </script>
@endsection
