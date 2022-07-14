@extends('layouts.admin')
@section('title', 'Chỉnh sửa phòng tư vấn')
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
                        <form action="{{ route('admin.chatrooms.update', ['id' => $chatroom->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên phòng tư vấn</label>
                                <input type="text" value="{{$chatroom->name ??  old('name') }}" name="name" class="form-control" id="name">
                                @error('title')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Mô tả</label>
                                <textarea class="form-control" name="description" cols="30" rows="5">{{$chatroom->description ??  old('description') }}</textarea>
                                @error('description')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Thành viên</label>
                                <select name="user_id[]" class="form-control select2_init" multiple>
                                    <option></option>
                                    @foreach ($users as $user)
                                        <option {{ $chatroom->users->contains('id', $user->id) ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Cập nhật</button>
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
    <script src="{{ asset('admin/product/add.js') }}"></script>
    <script>
    $(function () {
        $('.select2_init').select2({
            'placeholder': 'Chọn thành viên',
        })
    })
    </script>
@endsection
