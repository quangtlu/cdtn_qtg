@extends('layouts.admin')
@section('title', 'Sửa thông tin chủ sở hữu tác phẩm')
@section('content')
    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'Chủ sở hữu tác phẩm', 'key' => 'Sửa thông tin'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.owners.update', ["id" => $owner->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Họ và tên</label>
                                <input type="text" value="{{ $owner->name }}" name="name" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Số điện thoại</label>
                                <input value="{{ $owner->phone }}" type="text" name="phone" class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Email</label>
                                <input value="{{ $owner->email }}" type="email" name="email" class="form-control" id="category_name">
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
