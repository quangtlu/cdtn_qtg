@extends('layouts.admin')
@section('title', 'Thêm mới bài viết')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
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
                                <label class="label-required" for="category_name">Tiêu đề</label>
                                <input type="text" name="title" class="form-control" id="category_name"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Thẻ tag</label>
                                <select name="tag_id[]" class="form-control select2" multiple>
                                    <option></option>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            {{ collect(old('tag_id'))->contains($tag->id) ? 'selected' : '' }}>
                                            {{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mục lục</label>
                                <select name="category_id[]" class="form-control select2" multiple>
                                    <option></option>
                                    @include('common.option-categories', ['categories' => $categories])
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tài liệu tham khảo</label>
                                <select name="reference_id[]" class="form-control select2" multiple>
                                    <option></option>
                                    @foreach ($references as $reference)
                                        <option value="{{ $reference->id }}"
                                            {{ collect(old('reference_id'))->contains($reference->id) ? 'selected' : '' }}>
                                            {{ $reference->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label-required" for="category_name">Nội dung</label>
                                <textarea class="form-control" name="content" id="editor" cols="30" rows="5">{{ old('content') }}</textarea>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script src="{{ asset('admin/product/add.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
        $(function() {
            $('.select2').select2()

        })
        $('#summernote').summernote({
            height: 400
        });
    </script>
@endsection
