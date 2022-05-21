@extends('layouts.admin')
@section('title', 'Sửa thông tin tác phẩm')
@section('content')
    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'Tác phẩm', 'key' => 'Sửa thông tin'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.products.update', ["id" => $product->id]) }}" method="POST">
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
                                <label for="category_name">Chủ sở hữu tác phẩm</label>
                                <select name="owner_id" class="form-control" id="category_name">
                                    @if ($product->owner_id == 1)
                                        <option selected value="1">Admin</option>
                                        <option value="2">Người dùng</option>
                                    @else
                                        <option value="1">Admin</option>
                                        <option selected value="2">Người dùng</option>
                                    @endif
                                </select>
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
