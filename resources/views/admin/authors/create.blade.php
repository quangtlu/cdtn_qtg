@extends('layouts.admin')
@section('title', 'Thêm mới tác giả')
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
                        <form action="{{ route('admin.authors.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Họ và tên<b class="field-require">*</b></label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Ngày sinh</label>
                                    <input type="text" data-date-format='dd/mm/yyyy' class="form-control" name="dob" value="{{ old('dob') }}" id="dob" placeholder="dd/mm/yyyy">
                                @error('dob')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Giới tính<b class="field-require">*</b></label>
                                <select name="gender" class="form-control" id="gender">
                                    <option value=""></option>
                                    <option {{ old('gender') == 'nam' ? 'selected' : '' }} value="nam">Nam</option>
                                    <option {{ old('gender') == 'nu' ? 'selected' : '' }}  value="nu">Nữ</option>
                                </select>
                                @error('gender')
                                    <span class="mt-1 text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Số điện thoại<b class="field-require">*</b><b
                                        class="field-require">*</b></label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Email<b class="field-require">*</b><b
                                        class="field-require">*</b></label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                @error('email')
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
    <script src="{{ asset('js/datepicker.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.vi.min.js') }}"></script>
    <script>
        $('#dob').datepicker({
            language: 'vi',
            orientation: 'bottom',
            dateFormat: 'YY-mm-dd'
        });
    </script>
@endsection
