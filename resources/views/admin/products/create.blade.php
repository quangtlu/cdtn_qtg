@extends('layouts.admin')
@section('title', 'Thêm mới tác phẩm')
@section('content')
    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'Tác phẩm', 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.products.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên tác phẩm</label>
                                <input type="text" name="name" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ngày xuất bản</label>
                                <input type="date" name="pub_date" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ngày đăng kí tác phẩm</label>
                                <input type="date" name="regis_date" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Tác giả</label>
                                <select name="author_id" class="form-control" id="category_name">
                                    @foreach ($owners as $owner)
                                        <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category_name">Chủ sở hữu tác phẩm</label>
                                <select name="owner_id" class="form-control" id="category_name">
                                    @foreach ($owners as $owner)
                                        <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
