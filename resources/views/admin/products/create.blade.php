@extends('layouts.admin')
@section('title', 'Thêm mới tác phẩm')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.admin.content_header', ['name' => 'Tác phẩm', 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên tác phẩm</label>
                                <input type="text" name="name" class="form-control" >
                                @error('name')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ngày xuất bản</label>
                                <input type="date" name="pub_date" class="form-control" >
                                @error('pub_date')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ngày đăng kí tác phẩm</label>
                                <input type="date" name="regis_date" class="form-control" >
                                @error('regis_date')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tác giả</label>
                                <select name="author_id[]" class="form-control select2_init" multiple>
                                    <option></option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                @error('author_id')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Chủ sở hữu tác phẩm</label>
                                <select name="owner_id" class="form-control" >
                                    <option value=""></option>
                                    @foreach ($owners as $owner)
                                        <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                    @endforeach
                                </select>
                                @error('owner_id')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Mô tả</label>
                                <textarea class="form-control" name="description" id="summernote" cols="30" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ảnh</label>
                                <input type="file" multiple class="form-control-file" name="image[]" id="" cols="30" rows="5">
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
