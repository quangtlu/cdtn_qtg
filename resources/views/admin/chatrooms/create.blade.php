@extends('layouts.admin')
@section('title', 'Thêm mới phòng tư vấn')
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
                        <form action="{{ route('admin.chatrooms.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="label-required" for="name">Tên phòng tư vấn</label>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name">
                                @error('name')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-required" for="category_name">Mô tả</label>
                                <textarea class="form-control" name="description" cols="30" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="label-required">Thành viên</label>
                                <select name="user_id[]" class="form-control select2_init" multiple>
                                    <option></option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ (collect(old('user_id'))->contains($user->id)) ? 'selected':'' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-required">Bài viết</label>
                                <select name="post_id" class="form-control">
                                    <option></option>
                                    @foreach ($posts as $post)
                                        <option value="{{ $post->id }}" {{ (collect(old('user_id'))->contains($post->id)) ? 'selected':'' }}>{{ $post->title }}</option>
                                    @endforeach
                                </select>
                                @error('post_id')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="{{ asset('admin/product/add.js') }}"></script>
    <script>
    $(function () {
        $('.select2_init').select2({
            'placeholder': 'Chọn thành viên',
        })
    })
    </script>
@endsection
