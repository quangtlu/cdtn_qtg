@extends('layouts.admin')
@section('title', 'Quản lý bài viết')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('admin/product/index.css') }}" />
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.admin.content_header', ['name' => 'Bài viết', 'key' => 'Danh sách'])
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <a class="col-md-1 btn btn-success btn-sm float-right m-2" href="{{ route('admin.posts.create') }}">Thêm</a>
                    {{-- search --}}
                    <div class="nav-item col-md-10">
                        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                            <i class="fas fa-search"></i>
                        </a>
                        <div class="navbar-search-block">
                            <form class="form-inline" action="{{ route('admin.posts.search') }}" method="GET">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" name="keyword" required type="search"
                                        placeholder="Tìm kiếm theo ID, tiêu đề, nội dung, tác giả..." aria-label="Search">
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
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ảnh</th>
                                    <th>Tên bài viết</th>
                                    <th>Tác giả</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>
                                            @if ($post->image)
                                                <img class="avt-product index-avt"
                                                    src=" {{ asset('image/posts/' . explode('|', $post->image)[0]) }}"
                                                    alt="">
                                            @else
                                                <img class="avt-product index-avt"
                                                    src="{{ asset('image/posts/no_image.jpg') }}" alt="">
                                            @endif
                                        </td>

                                        <td>{{ Str::ucfirst($post->title) }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.posts.edit', ['id' => $post->id]) }}"><button
                                                    class="btn btn-info btn-sm">Sửa</button></a>
                                            <button type="button"
                                                data-url="{{ route('admin.posts.destroy', ['id' => $post->id]) }}"
                                                class="btn btn-danger btn-sm btn-delete">Xoá</i></button>
                                            <a href="{{ route('admin.posts.show', ['id' => $post->id]) }}"><button
                                                    class="btn btn-info btn-sm">Chi tiết</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $posts->withQueryString()->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
