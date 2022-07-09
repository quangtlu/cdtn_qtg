@extends('layouts.admin')
@section('title', 'Sửa thông tin tác giả')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.authors.update', ['id' => $author->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Họ và tên<b class="field-require">*</b></label>
                                <input type="text" value="{{ $author->name }}" name="name" class="form-control">
                                @error('name')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ngày sinh</label>
                                {{-- <input value="{{ $author->dob }}" type="datetime-local" placeholder="yyyy-mm-dd" name="dob" class="form-control" style="background-color: #fff"> --}}
                                <input type="text" data-date-format='yyyy-mm-dd' class="form-control" name="dob" value="{{ old('dob') ?? $author->dob }}" id="dob" placeholder="yyyy-mm-dd">

                                @error('dob')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Giới tính<b class="field-require">*</b></label>
                                <select name="gender" id="" class="form-control">
                                    @if ($author->gender == 'Nam')
                                        <option value="Nam" selected>Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    @else
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ" selected>Nữ</option>
                                    @endif
                                </select>
                                @error('gender')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Số điện thoại <b class="field-require">*</b></label>
                                <input value="{{ $author->phone }}" type="text" name="phone" class="form-control">
                                @error('phone')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Email <b class="field-require">*</b></label>
                                <input value="{{ $author->email }}" type="email" name="email" class="form-control">
                                @error('email')
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
    <script src="{{ asset('js/datepicker.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.vi.min.js') }}"></script>
    <script>
        $('#dob').datepicker({
            language: 'vi',
            orientation: 'bottom',
        });
    </script>
@endsection
