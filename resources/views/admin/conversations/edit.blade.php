@extends('layouts.admin')
@section('title', 'Sửa thông tin hội thoại')
@section('content')
    <div class="content-wrapper">
        @include('partials.content_header', ['name' => 'Hội thoại', 'key' => 'Sửa thông tin'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.conversations.update', ["id" => $conversation->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên chủ sở hữu</label>
                                <input type="text" value="{{ $conversations->name }}" name="name" class="form-control" id="category_name">
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
