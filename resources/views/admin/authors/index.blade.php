@extends('layouts.admin')
@section('title', 'Quản lý tác giả')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card w-100 mt-2">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div>
                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('admin.authors.create') }}">Thêm mới</a>
                                </div>
                                <div id="search">
                                    <a class="btn btn-info btn-sm" data-toggle="collapse" href="#collapseSearch"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        Tìm kiếm <i class="fas fa-search pl-4 pr-4"></i>
                                    </a>
                                </div>
                            </div>
                            <div id="toggle" style="display: none">
                                <div class="row pt-2" >
                                    <form action="{{ route('admin.authors.index') }}" method="get">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <select name="name" id="sort" class="form-control">
                                                    <option value="{{ config('consts.user.all') }}"
                                                        class="filter-option-dafault">Tên tác giả</option>
                                                    <option value="{{ config('consts.user.all') }}"
                                                        class="filter-option-dafault">Tất cả</option>
                                                    @foreach ($authors as $author)
                                                        <option value="{{ $author->name }}"
                                                            {{ request()->name == $author->name ? 'selected' : false }}>
                                                            {{ $author->name }}</option>
                                                    @endforeach
                                                    @foreach ($authors as $author)
                                                        <option value="{{ $author->name }}">{{ $author->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select name="gender" id="sort" class="form-control">
                                                    <option value="{{ config('consts.user.all') }}"
                                                        class="filter-option-dafault">Giới tính</option>
                                                    <option value="Nam">Nam</option>
                                                    <option value="Nữ">Nữ</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select name="email" id="sort" class="form-control">
                                                    <option value="{{ config('consts.user.all') }}"
                                                        class="filter-option-dafault">Email</option>
                                                    <option value="{{ config('consts.user.all') }}"
                                                        class="filter-option-dafault">Tất cả</option>
                                                    @foreach ($authors as $author)
                                                        <option value="{{ $author->email }}"
                                                            {{ request()->email == $author->email ? 'selected' : false }}>
                                                            {{ $author->email }}
                                                        </option>
                                                        @foreach ($authors as $author)
                                                            <option value="{{ $author->email }}">
                                                                {{ $author->email }}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select name="phone" id="sort" class="form-control">
                                                    <option value="{{ config('consts.user.all') }}"
                                                        class="filter-option-dafault">Phone</option>
                                                    <option value="{{ config('consts.user.all') }}"
                                                        class="filter-option-dafault">Tất cả</option>
                                                    @foreach ($authors as $author)
                                                        <option value="{{ $author->phone }}"
                                                            {{ request()->phone == $author->phone ? 'selected' : false }}>
                                                            {{ $author->phone }}</option>
                                                    @endforeach
                                                    @foreach ($authors as $author)
                                                        <option value="{{ $author->phone }}">{{ $author->phone }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="keyword"
                                                    placeholder="Tìm kiếm tên, email, số điện thoại"
                                                    class="form-control" value="{{ request()->keyword }}">
                                            </div>
                                            <div class="col-md-1">
                                                <button type="submit" class="btn btn-info btn-block"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 card">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Họ tên</th>
                                    <th>Giới tính</th>
                                    <th>Ngày sinh</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($authors as $author)
                                    <tr>
                                        <td>{{ $author->id }}</td>
                                        <td>{{ $author->name }}</td>
                                        <td>
                                            @foreach (config('consts.user.gender') as $gender)
                                                @if ($gender['value'] == $author->gender)
                                                    {{ $gender['name'] }}
                                                @endif 
                                            @endforeach
                                        </td>
                                        <td>{{ $author->dob }}</td>
                                        <td>{{ $author->email }}</td>
                                        <td>{{ $author->phone }}</td>
                                        <td>
                                            <a href="{{ route('admin.authors.edit', ['id' => $author->id]) }}"><button
                                                    class="btn btn-info btn-sm">Sửa</button></a>
                                            <button type="button"
                                                data-url="{{ route('admin.authors.destroy', ['id' => $author->id]) }}"
                                                class="btn btn-danger btn-sm btn-delete">Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $authors->withQueryString()->links() }}
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
        $('#header-search-form').attr('action', '{{ route('admin.authors.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm tên tác giả, email, giới tính, số điện thoại...');

        $(document).ready(function() {
            $('#search').click(function() {
                $('#toggle').slideToggle();
            });
        });
    </script>
@endsection
