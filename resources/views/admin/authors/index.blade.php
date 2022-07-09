@extends('layouts.admin')
@section('title', 'Quản lý tác giả')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.admin.content_header', ['name' => 'Tác giả', 'key' => 'Danh sách'])
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="row justify-content-between" style="width:100%">
                        <div>
                            <a class="btn btn-success btn-sm float-right m-2" href="{{ route('admin.authors.create') }}">Thêm mới</a>
                        </div>
                        <div class="mt-2" id="search">
                            <a class="card btn btn-default my-auto float-left" data-toggle="collapse" href="#collapseSearch"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-search pl-4 pr-4"></i>
                            </a>
                        </div>
                        <div class="card" id="toggle" style="display: none">
                            <div class="p-2">
                                <form action="{{ route('admin.authors.index') }}" method="get">
                                    <div class="row col-md-12 mb-2">
                                        <div class="col-md-2">
                                            <select name="name" id="sort" class="form-control">
                                                <option value="{{ config("consts.user.all") }}" class="filter-option-dafault">Tên tác giả</option>
                                                <option value="{{ config("consts.user.all") }}" class="filter-option-dafault">Tất cả</option>
                                                    @foreach ($authors as $author)
                                                        <option value="{{ $author->name }}" {{ request()->name == $author->name ? 'selected' : false }}>
                                                            {{ $author->name }}</option>
                                                    @endforeach
                                                    @foreach ($authorAll as $author)
                                                        <option value="{{ $author->name }}">{{ $author->name }}</option>
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
                                                @foreach ($authors as $author)
                                                    <option value="{{ $author->email }}"
                                                        {{ request()->email == $author->email ? 'selected' : false }}>{{ $author->email }}
                                                    </option>
                                                    @foreach ($authorAll as $author)
                                                        <option value="{{ $author->email }}">{{ $author->email }}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select name="phone" id="sort" class="form-control">
                                                <option value="{{ config("consts.user.all") }}" class="filter-option-dafault">Phone</option>
                                                <option value="{{ config("consts.user.all") }}" class="filter-option-dafault">Tất cả</option>
                                                @foreach ($authors as $author)
                                                    <option value="{{ $author->phone }}" {{ request()->phone == $author->phone ? 'selected' : false }}>
                                                        {{ $author->phone }}</option>
                                                @endforeach
                                                @foreach ($authorAll as $author)
                                                    <option value="{{ $author->phone }}">{{ $author->phone }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div style="max-width:30%; padding:0 7.5px">
                                            <input type="text" name="keyword" placeholder="Tìm kiếm tên, email, số điện thoại" class="form-control" value="{{ request()->keyword }}">
                                        </div>
                                        <div class="col-md-2" style="display: contents;">
                                            <button type="submit" class="btn btn-primary ml-2">Tìm kiếm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                {{-- @can('admin edit author' | 'admin delete author') --}}
                                <th>Action</th>
                                {{-- @endcan --}}
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($authors as $author)
                                    <tr>
                                        <td>{{ $author->id }}</td>
                                        <td>{{ $author->name }}</td>
                                        <td>{{ Str::ucfirst($author->gender) }}</td>
                                        <td>{{ $author->dob }}</td>
                                        <td>{{ $author->email }}</td>
                                        <td>{{ $author->phone }}</td>
                                        <td>
                                            {{-- @can('admin edit author') --}}
                                            <a href="{{ route('admin.authors.edit', ["id" => $author->id]) }}"><button class="btn btn-info btn-sm">Sửa</button></a>
                                                {{-- @can('admin delete author') --}}
                                            <button type="button" data-url="{{ route('admin.authors.destroy', ["id" => $author->id]) }}" class="btn btn-danger btn-sm btn-delete">Xóa</button>
                                                {{-- @endcan --}}
                                            {{-- @endcan --}}
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

        $(document).ready( function() {
            $('#search').click(function(){
                $('#toggle').slideToggle();
            });
        });
    </script>
@endsection