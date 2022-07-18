@extends('layouts.admin')
@section('title', 'Quản lý chủ sở hữu')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card w-100 mt-2">
                        <div class="card-body">
                            <div class="row justify-content-between" style="width:100%">
                                <div>
                                    <a class="btn btn-success btn-sm float-right m-2" href="{{ route('admin.owners.create') }}">Thêm
                                        mới</a>
                                </div>
                                <div id="search">
                                    <a class="btn btn-info my-auto float-left" data-toggle="collapse" href="#collapseSearch"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        Tìm kiếm <i class="fas fa-search pl-4 pr-4"></i>
                                    </a>
                                </div>
                                <div class="row" id="toggle" style="display: none">
                                    <div class="p-2">
                                        <form action="{{ route('admin.owners.index') }}" method="get">
                                            <div class="row col-md-12 mb-2">
                                                <div class="col-2">
                                                    <select name="name" id="sort" class="form-control">
                                                        <option value="{{ config('consts.user.all') }}"
                                                            class="filter-option-dafault">Tên chủ sở hữu</option>
                                                        <option value="{{ config('consts.user.all') }}"
                                                            class="filter-option-dafault">Tất cả</option>
                                                        @foreach ($owners as $owner)
                                                            <option value="{{ $owner->name }}"
                                                                {{ request()->name == $owner->name ? 'selected' : false }}>
                                                                {{ $owner->name }}</option>
                                                        @endforeach
                                                        @foreach ($ownerAll as $owner)
                                                            <option value="{{ $owner->name }}">{{ $owner->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-2">
                                                    <select name="email" id="sort" class="form-control">
                                                        <option value="{{ config('consts.user.all') }}"
                                                            class="filter-option-dafault">Email</option>
                                                        <option value="{{ config('consts.user.all') }}"
                                                            class="filter-option-dafault">Tất cả</option>
                                                        @foreach ($owners as $owner)
                                                            <option value="{{ $owner->email }}"
                                                                {{ request()->email == $owner->email ? 'selected' : false }}>
                                                                {{ $owner->email }}
                                                            </option>
                                                            @foreach ($ownerAll as $owner)
                                                                <option value="{{ $owner->email }}">{{ $owner->email }}
                                                                </option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-2">
                                                    <select name="phone" id="sort" class="form-control">
                                                        <option value="{{ config('consts.user.all') }}"
                                                            class="filter-option-dafault">Phone</option>
                                                        <option value="{{ config('consts.user.all') }}"
                                                            class="filter-option-dafault">Tất cả</option>
                                                        @foreach ($owners as $owner)
                                                            <option value="{{ $owner->phone }}"
                                                                {{ request()->phone == $owner->phone ? 'selected' : false }}>
                                                                {{ $owner->phone }}</option>
                                                        @endforeach
                                                        @foreach ($ownerAll as $owner)
                                                            <option value="{{ $owner->phone }}">{{ $owner->phone }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <input type="text" name="keyword"
                                                        placeholder="Tìm kiếm tên, email, số điện thoại" class="form-control"
                                                        value="{{ request()->keyword }}">
                                                </div>
                                                <div class="col-2">
                                                    <button type="submit" class="btn btn-primary ml-2">Tìm kiếm</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 card">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên chủ sơ hữu</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    {{-- @can('add owner | edit owner') --}}
                                    <th>Action</th>
                                    {{-- @endcan --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($owners as $owner)
                                    <tr>
                                        <td>{{ $owner->id }}</td>
                                        <td>{{ $owner->name }}</td>
                                        <td>{{ $owner->email }}</td>
                                        <td>{{ $owner->phone }}</td>
                                        <td>
                                            <a href="{{ route('admin.owners.edit', ['id' => $owner->id]) }}"><button
                                                    class="btn btn-info btn-sm">Sửa</button></a>
                                            <button type="button"
                                                data-url="{{ route('admin.owners.destroy', ['id' => $owner->id]) }}"
                                                class="btn btn-danger btn-sm btn-delete">Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $owners->withQueryString()->links() }}
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </div>
    @endsection
    @section('js')
        <script>
            $('#header-search-form').attr('action', '{{ route('admin.owners.index') }}');
            $('#search-input').attr('placeholder', 'Tìm kiếm chủ sở hữu, email, số điện thoại...');

            $(document).ready(function() {
                $('#search').click(function() {
                    $('#toggle').slideToggle();
                });
            });
        </script>
    @endsection
