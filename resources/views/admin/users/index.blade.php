@extends('layouts.admin')
@section('title', 'Quản lý người dùng')
@section('js')
    <script src="{{ asset('js/alert.js') }}"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/product/index.css')}}"/>
    <style>
        .filter-option-dafault {
            font-weight: bold;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.admin.content_header', ['name' => 'Người dùng', 'key' => 'Danh sách'])
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <a class="col-md-1 btn btn-success btn-sm float-right m-2" href="{{ route('admin.users.create') }}">Thêm</a>
                    <form action="{{ route('admin.users.index') }}" method="get">
                        <div class="row col-md-12">
                            <div class="col-md-2">
                                <select name="name" id="sort" class="form-control">
                                    <option value="{{ config("consts.user.all") }}" class="filter-option-dafault">Tên người dùng</option>
                                    <option value="{{ config("consts.user.all") }}" class="filter-option-dafault">Tất cả</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->name }}" {{ request()->name == $user->name ? 'selected' : false }}>
                                                {{ $user->name }}</option>
                                        @endforeach
                                        @foreach ($userAll as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="gender" id="sort" class="form-control">
                                    <option value="{{ config("consts.user.all") }}" class="filter-option-dafault">Giới tính</option>
                                    <option value="nam" >Nam</option>
                                    <option value="Nữ" >Nữ</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="email" id="sort" class="form-control">
                                    <option value="{{ config("consts.user.all") }}" class="filter-option-dafault">Email</option>
                                    <option value="{{ config("consts.user.all") }}" class="filter-option-dafault">Tất cả</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->email }}"
                                            {{ request()->email == $user->email ? 'selected' : false }}>{{ $user->email }}
                                        </option>
                                        @foreach ($userAll as $user)
                                            <option value="{{ $user->email }}">{{ $user->email }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="phone" id="sort" class="form-control">
                                    <option value="{{ config("consts.user.all") }}" class="filter-option-dafault">Phone</option>
                                    <option value="{{ config("consts.user.all") }}" class="filter-option-dafault">Tất cả</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->phone }}" {{ request()->phone == $user->phone ? 'selected' : false }}>
                                            {{ $user->phone }}</option>
                                    @endforeach
                                    @foreach ($userAll as $user)
                                        <option value="{{ $user->phone }}">{{ $user->phone }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="role_id" id="sort" class="form-control">
                                    <option value="0" class="filter-option-dafault">Quyền</option>
                                    <option value="0" class="filter-option-dafault">Tất cả</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ request()->id == $role->id ? 'selected' : false }}>
                                            {{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="keyword" placeholder="Tìm kiếm tên, email, số điện thoại" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ảnh</th>
                                <th>Họ tên</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>
                                            <img class="avt-product index-avt" src=" {{ asset('image/profile/'.$user->image) }}" alt="">
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ Str::ucfirst($user->gender) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($user->dob)) }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.edit', ["id" => $user->id]) }}"><button class="btn btn-info btn-sm">Sửa</button></a>
                                            <button type="button" data-url="{{ route('admin.users.destroy', ["id" => $user->id]) }}" class="btn btn-danger btn-sm btn-delete">Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->withQueryString()->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
@section('js')
    <script>
        $('#header-search-form').attr('action', '{{ route('admin.users.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm tên người dùng, email, giới tính, số điện thoại...');
    </script>
@endsection