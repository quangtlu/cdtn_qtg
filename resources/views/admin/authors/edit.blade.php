@extends('layouts.admin')
@section('title', 'Sửa thông tin tác giả')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container w-50 pt-5">
                <form action="{{ route('admin.authors.update', ['id' => $author->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="label-required" for="category_name">Họ và tên</label>
                        <input type="text" value="{{ old('name') ?? $author->name }}" name="name" class="form-control">
                        @error('name')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_name">Ngày sinh</label>
                        <input type="date"  class="form-control" name="dob" value="{{ old('dob') ?? $author->dob }}" id="dob" >
                        @error('dob')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="label-required" for="category_name">Giới tính</label>
                        <select name="gender" class="form-control" id="gender">
                            <option value=""></option>
                            @foreach (config('consts.user.gender') as $gender)
                                <option {{ (old('gender') == $gender['value'] || $author->gender == $gender['value']) ? 'selected' : '' }}  
                                value="{{ $gender['value']  }}">{{$gender['name'] }}</option>
                            @endforeach
                        </select>
                        @error('gender')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="label-required" for="category_name">Số điện thoại</label>
                        <input value="{{ old('phone') ?? $author->phone }}" type="text" name="phone" class="form-control">
                        @error('phone')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="label-required" for="category_name">Email</label>
                        <input value="{{ old('email') ?? $author->email }}" type="email" name="email" class="form-control">
                        @error('email')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Cập nhật</button>
                </form>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection
