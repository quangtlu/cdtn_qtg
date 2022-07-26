@extends('layouts.admin')
@section('title', 'Thêm mới tác giả')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container w-50 pt-5">
                <form action="{{ route('admin.authors.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="label-required" for="category_name">Họ và tên</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        @error('name')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_name">Ngày sinh</label>
                            <input type="date" class="form-control" name="dob" value="{{ old('dob') }}" id="dob">
                        @error('dob')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="label-required" class="form-label">Giới tính</label>
                        <select name="gender" class="form-control" id="gender">
                            <option value=""></option>
                            @foreach (config('consts.user.gender') as $gender)
                                <option {{ (old('gender') == $gender['value']) ? 'selected' : '' }}  
                                value="{{ $gender['value']  }}">{{$gender['name'] }}</option>
                            @endforeach
                        </select>
                        @error('gender')
                            <span class="mt-1 text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="label-required" for="category_name">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                        @error('phone')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="label-required" for="category_name">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        @error('email')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
@endsection


