@extends('layouts.admin')
@section('title', 'Thêm mới bài viết')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tiêu đề</label>
                                <input type="text" name="title" class="form-control" id="category_name"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Thẻ tag</label>
                                <select name="tag_id[]" class="form-control select2_init" multiple>
                                    <option></option>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            {{ collect(old('tag_id'))->contains($tag->id) ? 'selected' : '' }}>
                                            {{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                @error('tag_id')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mục lục</label>
                                <select name="category_id[]" class="form-control select3_init" multiple>
                                    <option></option>
                                    @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ collect(old('category_id'))->contains($category->id) ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Nội dung</label>
                                <textarea class="form-control" name="content" id="summernote" cols="30" rows="5">{{ old('content') }}</textarea>
                                @error('content')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="hidden" value="{{ config('consts.post.status.solved.value') }}" name="status">
                            <div class="form-group">
                                <label for="category_name">Ảnh</label>
                                <input type="file" accept="image/*" multiple class="form-control-file" name="image[]"
                                    id="" cols="30" rows="5">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Thêm mới</button>
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
                'placeholder': 'Chọn thẻ tag',
            })
            $('.select3_init').select2({
                'placeholder': 'Chọn mục lục',
            })
        })
        $('#summernote').summernote({
            height: 400
        });
    </script>
@endsection
