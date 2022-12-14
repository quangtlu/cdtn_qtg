@extends('layouts.admin')
@section('title', 'Thêm mới tác phẩm')
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
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="label-required" for="category_name">Tên tác phẩm</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-required" for="category_name">Ngày xuất bản</label>
                                <input type="date"  class="form-control date-time" name="pub_date" value="{{ old('pub_date') }}">
                                @error('pub_date')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-required" for="category_name">Ngày đăng kí tác phẩm</label>
                                <input type="date"  class="form-control date-time" name="regis_date" value="{{ old('pub_date') }}">
                                @error('regis_date')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-required">Tác giả</label>
                                <select name="author_id[]" class="form-control select2_init" multiple>
                                    <option></option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}" {{ (collect(old('author_id'))->contains($author->id)) ? 'selected':'' }}>{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                @error('author_id')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mục lục</label>
                                <select name="categoryIds[]" class="form-control select2_init" multiple>
                                    <option></option>
                                    @include('common.option-categories', ['categories' => $categories])
                                </select>
                                @error('categoryIds')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-required" for="category_name">Chủ sở hữu tác phẩm</label>
                                <select name="owner_id" class="form-control">
                                    <option value=""></option>
                                    @foreach ($owners as $owner)
                                        <option value="{{ $owner->id }}" @if(old('owner_id') == $owner->id) selected @endif>{{ $owner->name }}</option>
                                    @endforeach
                                </select>
                                @error('owner_id')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-required" for="category_name">Mô tả</label>
                                <textarea class="form-control" name="description" id="editor" cols="30" rows="5">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ảnh</label>
                                <input type="file" accept="image/*" multiple class="form-control-file" name="image[]" id="" cols="30"
                                    rows="5">
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
        $(function() {
            $('.select2_init').select2({})
        })
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
