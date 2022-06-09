@extends('layouts.admin')
@section('title', 'Quản lý tag')
@section('css')
@endsection
@section('js')
    <script src="{{ asset('admin/role/create.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.admin.content_header', ['name' => 'tag', 'key' => 'Quản lý'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.tags.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên tag</label>
                                <input type="text" name="name" class="form-control" >
                                @error('name')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @can('admin add permission')
                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                            @endcan
                        </form>
                    </div>
                    <div class="col-md-6">
                        {{-- search --}}
                    <div class="nav-item col-md-12">
                        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                            <i class="fas fa-search"></i>
                        </a>
                        <div class="navbar-search-block">
                            <form class="form-inline" action="{{ route('admin.tags.search') }}" method="GET">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" name="keyword" required type="search"
                                        placeholder="Tìm kiếm tên tag..." aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- end search --}}
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên tag</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>
                                            <input id="tag-name" class="form-control" value="{{ $tag->name }}" name="name" disabled="true" type="text">
                                        </td>
                                        <td>
                                            {{-- <a href="{{ route('admin.tags.edit', ["id" => $tag->id]) }}"> --}}
                                                <button type="button" data-url="{{ route('admin.tags.edit', ["id" => $tag->id]) }}" id="btn_edit" checked="checked" class="btn btn-info btn-sm">Sửa</button>
                                            {{-- </a> --}}
                                            {{-- <button type="button" data-url="{{ route('admin.tags.edit', ["id" => $tag->id]) }}" class="btn btn-info btn-sm">Sửa</button> --}}
                                            <button type="button" data-url="{{ route('admin.tags.destroy', ["id" => $tag->id]) }}" class="btn btn-danger btn-sm btn-delete">Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $tags->withQueryString()->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection


