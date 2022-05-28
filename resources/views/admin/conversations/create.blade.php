@extends('layouts.admin')
@section('title', 'Thêm mới hội thoại')
@section('content')
    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'Hội thoại', 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.conversations.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên chủ sở hữu</label>
                                <input type="text" name="name" class="form-control" >
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
