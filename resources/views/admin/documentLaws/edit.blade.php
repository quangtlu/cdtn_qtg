@extends('layouts.admin')
@section('title', 'Sửa thông tin tác giả')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/product/index.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container w-50 pt-5">
                <form action="{{ route('admin.documentLaws.update', ['id' => $documentLaw->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="label-required" for="category_name">Tên văn bản pháp luật</label>
                        <input type="text" value="{{ old('title') ?? $documentLaw->title }}" name="title" class="form-control">
                        @error('title')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="label-required" for="category_name">Link văn bản</label>
                        <input type="file" accept="file/*" multiple class="form-control-file" name="url" id="" cols="30"
                            rows="5" value="{{ old('url') ?? $documentLaw->url }}">
                    </div>
                    <div class="form-group">
                        <label class="label-required" for="category_name">Thumbnail</label>
                        <input type="file" accept="image/*" multiple class="form-control-file" name="thumbnail" id="" cols="30"
                            rows="5" value="">
                        <div class="picture">
                            <img class="" style="width: 50%; height:50%" src="{{ asset("image/documentLaws/$thumbnail") }}" alt="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  for="category_name">Mô tả</label>
                        <textarea class="form-control" value="{{ old('description') ?? $documentLaw->description }}" name="description" id="editor" cols="30" rows="5">{{ $documentLaw->description }}</textarea>
                        @error('description')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Cập nhật</button>
                </form>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
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
