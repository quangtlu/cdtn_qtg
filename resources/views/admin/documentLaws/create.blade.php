@extends('layouts.admin')
@section('title', 'Thêm mới tác giả')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container w-50 pt-5">
                <form action="{{ route('admin.documentLaws.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="label-required" for="category_name">Tên văn bản pháp luật</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                        @error('title')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="label-required" for="category_name">Tệp đính kèm</label>
                        <input type="file" accept="file_extension" multiple class="form-control-file" name="url"
                            id="" cols="30" rows="5" value="{{ old('url') }}">
                        @error('url')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="label-required" for="category_name">Thumbnail</label>
                        <input type="file" accept="image/*" multiple class="form-control-file" name="thumbnail"
                            id="" cols="30" rows="5">
                        @error('thumbnail')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label  for="category_name">Mô tả</label>
                        <textarea class="form-control" name="description" id="editor" cols="30" rows="5">{{ old('description') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script src="{{ asset('admin/product/add.js') }}"></script>
    <script>
        $(function() {
            ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
        })
    </script>
@endsection
