@extends('layouts.admin')
@section('title', 'Quản lý bài viết')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/product/index.css') }}" />
@endsection
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
                                    <a class="btn btn-success btn-sm float-right m-2" href="{{ route('admin.posts.create') }}">Thêm mới</a>
                                </div>
                                <div id="search">
                                    <a class="btn btn-info my-auto float-left" data-toggle="collapse" href="#collapseSearch"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        Tìm kiếm <i class="fas fa-search pl-4 pr-4"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row" id="toggle" style="display: none">
                                <div class="p-2">
                                    <form action="{{ route('admin.posts.index') }}" method="get">
                                        <div class="row col-md-12 mb-2">
                                            <div class="col-md-2">
                                                <select name="tag_id" class="form-control">
                                                    <option value="" class="filter-option-dafault">Tag</option>
                                                    <option value="" class="filter-option-dafault">Tất cả</option>
                                                    @foreach ($tags as $tag)
                                                        <option value="{{ $tag->id }}" {{ request()->tag_id == $tag->id ? 'selected' : false }}>
                                                            {{ $tag->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select name="category_id" id="sort" class="form-control">
                                                    <option value="" class="filter-option-dafault">mục lục</option>
                                                    <option value="" class="filter-option-dafault">Tất cả</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ request()->category_id == $category->id ? 'selected' : false }}>{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select name="status" id="sort" class="form-control">
                                                    <option value="" class="filter-option-dafault">Trạng thái</option>
                                                    @foreach (config('consts.post.status') as $status)
                                                        <option value="{{ $status['value'] }}" class="filter-option-dafault">{{ $status['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="keyword" placeholder="Tìm kiếm bài viết" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
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
                                    <th>Ảnh</th>
                                    <th>Tên bài viết</th>
                                    <th>Tác giả</th>
                                    <th>Trạng thái</th>
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
                                        <td>{{ $post->user->name ?? 'Không xác định' }}</td>
                                        <td>
                                            @foreach (config('consts.post.status') as $status)
                                                @if ($post->status == $status['value'])
                                                    <a class="{{ $status['className'] }}">
                                                        {{ $status['name'] }}
                                                    </a> 
                                                @endif
                                            @endforeach
                                        </td>
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
@section('js')
    <script>
        $('#header-search-form').attr('action', '{{ route('admin.posts.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm bài viết, tag, danh muc...');

        $(document).ready( function() {
            $('#search').click(function(){
                $('#toggle').slideToggle();
            });
        });
    </script>
@endsection
