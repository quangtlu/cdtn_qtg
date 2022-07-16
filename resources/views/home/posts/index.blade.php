@extends('layouts.home')
@section('title', 'Bài viết')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
    <style>
        .form-filters {
            margin-bottom: 60px;
            margin: 0 0 60px -15px;
        }

        .sort-product {
            margin: 0 0 13px 0px;

        }
    </style>
@endsection
@section('content')
    {{-- add/update post --}}
    @auth
        <div class="panel panel-primary">
            <div class="panel-heading">Đăng bài viết</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-1">
                        <img id="avt-user" src="{{ asset('image/profile/' . Auth::user()->image) }}" alt="">
                    </div>
                    <div class="col-md-11">
                        <span data-toggle="modal" data-target="#add-modal" id="create-post" class="form-control">
                            {{ Auth::user()->name }} ơi, đăng bài lên diễn đàm để cùng thảo luận nào
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @include('home.component.posts.modal-add', ['categories' => $categories, 'tags' => $tags])
    @endauth
    @guest
        <a class="agileits w3layouts" href="{{ route('login') }}">Đăng nhập để đăng bài viết<span
                class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
    @endguest
    <div class="col my-auto" id="search" style="margin-top: 2px;">
        <a class="card btn btn-default my-auto" data-toggle="collapse" href="#collapseSearch" aria-expanded="false"
            aria-controls="collapseExample">
            <i class="fa fa-search"></i>
            <span>Tìm kiếm bài viết</span>
        </a>
    </div>
    <div class="panel panel-primary" id="toggle" style="margin-top: 10px; display:none; padding: 15px">
        <div>
            <div class="sort-product">
                <form action="{{ route('posts.index') }}" method="GET">
                    <div class="row">
                        <div class="col-md-10">
                            <select name="sort" id="" class="form-control">
                                <option value="sort-new-post">Mới nhất</option>
                                <option value="sort-new-comment">Hoạt động gần đây</option>
                                <option value="sort-old-post">Cũ nhất</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary ">Sắp xếp</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="form-filters">
                <form action="{{ route('posts.index') }}" method="get">
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <select name="tag_id" class="form-control">
                                <option value="" class="filter-option-dafault">Tag</option>
                                <option value="" class="filter-option-dafault">Tất cả</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        {{ request()->tag_id == $tag->id ? 'selected' : false }}>
                                        {{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="category_id" id="sort" class="form-control">
                                <option value="" class="filter-option-dafault">Danh mục</option>
                                <option value="" class="filter-option-dafault">Tất cả</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ request()->category_id == $category->id ? 'selected' : false }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="status" id="sort" class="form-control">
                                <option value="" class="filter-option-dafault">Trạng thái</option>
                                @foreach (config('consts.post.status') as $status)
                                    @if (isset($isMyPost) &&
                                        $isMyPost == true &&
                                        ($status['value'] == config('consts.post.status.request.value') ||
                                            $status['value'] == config('consts.post.status.refuse.value')))
                                        <option value="{{ $status['value'] }}">{{ $status['name'] }}</option>
                                    @elseif ($status['value'] != config('consts.post.status.request.value') &&
                                        $status['value'] != config('consts.post.status.refuse.value'))
                                        <option value="{{ $status['value'] }}">{{ $status['name'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="keyword" placeholder="Tìm kiếm bài viết" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary" style="width:100%">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('home.component.posts.list', ['posts' => $posts])

@endsection
@section('js')
    <script defer src="{{ asset('template_blog/js/jquery.flexslider.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#search').click(function() {
            $('#toggle').fadeToggle();
        });
        $('#header-search-form').attr('action', '{{ route('posts.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm bài viết theo tiêu đề, nội dung, tác giả...');
        $('.summernote').summernote({
            height: 200
        });
        $('.select2_init').select2()
    </script>
@endsection
