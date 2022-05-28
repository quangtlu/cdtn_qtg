@extends('layouts.admin')
@section('title', 'Thêm mới tác giả')
@section('content')
    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'Tác giả', 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.authors.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Họ và tên</label>
                                <input type="text" name="name" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ngày sinh</label>
                                <input type="date" name="dob" class="form-control" >
                            </div>
                            @can('add author')
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                            @endcan
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
