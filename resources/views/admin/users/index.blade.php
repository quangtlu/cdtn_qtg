@extends('layouts.admin')
@section('title', 'Quản lý người dùng')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/product/index.css') }}" />
    <style>
        .filter-option-dafault {
            font-weight: bold;
        }

        .filter-user {
            max-width: 15%;
            margin: 0 5px;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card w-100 mt-2">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div>
                                    <a class="btn btn-success btn-sm float-right"
                                        href="{{ route('admin.users.create') }}">Thêm mới</a>
                                </div>
                                <div id="search">
                                    <a class="btn btn-info my-auto float-left" data-toggle="collapse" href="#collapseSearch"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        Tìm kiếm <i class="fas fa-search pl-4 pr-4"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row pt-2" id="toggle" style="display: none">
                                <form action="{{ route('admin.users.index') }}" class="w-100"  method="get">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <select name="name" id="sort" class="form-control">
                                                <option value="{{ config('consts.user.all') }}"
                                                    class="filter-option-dafault">Tên người dùng</option>
                                                <option value="{{ config('consts.user.all') }}"
                                                    class="filter-option-dafault">Tất cả</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->name }}"
                                                        {{ request()->name == $user->name ? 'selected' : false }}
                                                        value="{{ request()->name }}">
                                                        {{ $user->name }}</option>
                                                @endforeach
                                                @foreach ($userAll as $user)
                                                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <select name="gender" id="sort" class="form-control">
                                                <option value="{{ config('consts.user.all') }}"
                                                    class="filter-option-dafault">Giới tính</option>
                                                @foreach (config('consts.user.gender') as $gender)
                                                    <option value="{{ $gender['value'] }}">{{ $gender['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select name="email" id="sort" class="form-control">
                                                <option value="{{ config('consts.user.all') }}"
                                                    class="filter-option-dafault">Email</option>
                                                <option value="{{ config('consts.user.all') }}"
                                                    class="filter-option-dafault">Tất cả</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->email }}"
                                                        {{ request()->email == $user->email ? 'selected' : false }}>
                                                        {{ $user->email }}
                                                    </option>
                                                    @foreach ($userAll as $user)
                                                        <option value="{{ $user->email }}">{{ $user->email }}
                                                        </option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select name="phone" id="sort" class="form-control">
                                                <option value="{{ config('consts.user.all') }}"
                                                    class="filter-option-dafault">Số điện thoại</option>
                                                <option value="{{ config('consts.user.all') }}"
                                                    class="filter-option-dafault">Tất cả</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->phone }}"
                                                        {{ request()->phone == $user->phone ? 'selected' : false }}>
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
                                                    <option value="{{ $role->id }}"
                                                        {{ request()->id == $role->id ? 'selected' : false }}>
                                                        {{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="keyword"
                                                placeholder="Tìm kiếm tên, email, số điện thoại" class="form-control"
                                                value="{{ request()->keyword }}">
                                        </div>
                                        <div class="col-md-1">
                                            <button type="submit" class="btn btn-info btn-block"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 card">
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
                                            <img class="avt-product index-avt" style="border-radius:50%"
                                                src=" {{ asset('image/profile/' . $user->image) }}" alt="">
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @foreach (config('consts.user.gender') as $gender)
                                                @if ($gender['value'] == $user->gender)
                                                    {{ $gender['name'] }}
                                                @endif 
                                            @endforeach
                                        </td>
                                        <td>{{ $user->dob }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}"><button
                                                    class="btn btn-info btn-sm">Sửa</button></a>
                                            <button type="button"
                                                data-url="{{ route('admin.users.destroy', ['id' => $user->id]) }}"
                                                class="btn btn-danger btn-sm btn-delete">Xóa</button>
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

        $(document).ready(function() {
            $('#search').click(function() {
                $('#toggle').slideToggle();
            });
        });
    </script>
@endsection
