@extends('layouts.admin')
@section('title', 'Thêm mới chủ sở hữu')
@section('content')
    <div class="content-wrapper">
        @include('partials.admin.content_header', ['name' => 'Chủ sở hữu', 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.owners.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên chủ sở hữu</label>
                                <input type="text" name="name" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="category_name">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="category_name">Email</label>
                                <input type="email" name="email" class="form-control" >
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
