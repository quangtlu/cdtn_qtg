@extends('layouts.admin')
@section('title', 'Sửa thông tin tác giả')
@section('content')
    <div class="content-wrapper">
        @include('partials.admin.content_header', ['name' => 'Tác giả', 'key' => 'Sửa thông tin'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.authors.update', ["id" => $author->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Họ và tên</label>
                                <input type="text" value="{{ $author->name }}" name="name" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="category_name">Số điện thoại</label>
                                <input value="{{ $author->dob }}" type="date" name="dob" class="form-control" >
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
