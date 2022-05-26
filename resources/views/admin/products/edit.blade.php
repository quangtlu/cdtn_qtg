@extends('layouts.admin')
@section('title', 'Sửa thông tin tác phẩm')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'Tác phẩm', 'key' => 'Sửa thông tin'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.products.update', ["id" => $product->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên tác phẩm</label>
                                <input type="text" value="{{ $product->name }}" name="name" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ngày xuất bản</label>
                                <input value="{{ $product->pub_date }}" type="date" name="pub_date" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ngày đăng kí tác phẩm</label>
                                <input value="{{ $product->regis_date }}" type="date" name="regis_date" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label>Tác giả</label>
                                <select name="author_id[]" class="form-control select2_init" multiple>
                                    <option></option>
                                    @foreach ($authors as $author)
                                        <option {{ $productOfAuthors->contains('id', $author->id) ? 'selected' : '' }} value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category_name">Chủ sở hữu tác phẩm</label>
                                <select name="owner_id" class="form-control" id="category_name">
                                    @foreach ($owners as $owner)
                                        <option {{ $owner->id == $product->owner->id ? 'selected' : '' }} value="{{ $owner->id }}">{{ $owner->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category_name">Mô tả</label>
                                <textarea class="form-control tinymce_editor_init" value="{{ $product->description }}" name="description" id="" cols="30" rows="5">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ảnh</label>
                                <input type="file" multiple class="form-control-file" name="image[]" id="" cols="30" rows="5" value="">
                                <img class="product-img" src="{{ asset("image/products/$productImg") }}" alt="">                                    
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.2/tinymce.min.js"></script>
    <script src="{{ asset('admin/product/add.js') }}"></script>
    <script>
    $(function () {
        $('.select2_init').select2({
            'placeholder': 'Chọn tác giả'
        })
    })
    </script>
@endsection
