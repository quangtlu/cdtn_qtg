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

    @auth
        <div class="panel panel-primary">
            <div class="panel-heading">Đăng bài viết</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-1">
                        <img id="avt-user" src="{{ asset('image/profile/' . Auth::user()->image) }}" alt="">
                    </div>
                    <div class="col-md-11">
                        <span data-toggle="modal" data-target="#post-modal" id="create-post" class="form-control">
                            {{ Auth::user()->name }} ơi, đăng bài lên diễn đàm để cùng thảo luận nào
                        </span>
                    </div>
                </div>
            </div>

        </div>
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
                                <option value="" class="filter-option-dafault">Giải đáp</option>
                                <option value="{{ config('consts.post.status.solved.value') }}"
                                    class="filter-option-dafault">
                                    {{ config('consts.post.status.solved.name') }}</option>
                                <option value="{{ config('consts.post.status.unsolved.value') }}"
                                    class="filter-option-dafault">
                                    {{ config('consts.post.status.unsolved.name') }}</option>

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
    <div class="modal fade" id="post-modal" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="post-modalLabel">Tạo bài viết</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" name="title" class="form-control" id="title"
                                value="{{ old('title') }}">
                            @error('title')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Thẻ tag</label>
                            <select name="tag_id[]" class="form-control select2_init" multiple>
                                <option></option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        {{ collect(old('tag_id'))->contains($tag->id) ? 'selected' : '' }}>
                                        {{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @error('tag_id')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Danh mục</label>
                            <select name="category_id[]" class="form-control select3_init" multiple>
                                <option></option>
                                @foreach ($categories as $category)
                                    @if ($category->name == config('consts.category_reference.name'))
                                        @role('super-admin|editor')
                                            <option value="{{ $category->id }}"
                                                {{ collect(old('category_id'))->contains($category->id) ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endrole
                                    @else
                                        <option value="{{ $category->id }}"
                                            {{ collect(old('category_id'))->contains($category->id) ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="summernote">Nội dung</label>
                            <textarea class="form-control" name="content" class="content" id="summernote" cols="30" rows="5">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Ảnh</label>
                            <input type="file" multiple class="form-control-file" name="image[]" id="image">
                        </div>
                        <input type="hidden" name="status"
                            value="{{ config('consts.post.status.unsolved.value') }}">
                        <button type="submit" id="submit-btn" class="btn-modal-post btn btn-success mb-2">Đăng
                            bài</button>
                        <button type="button" class="btn-modal-post btn btn-danger" data-dismiss="modal">Đóng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (isset($posts))
        @foreach ($posts as $index => $post)
            <div class="wthree-top-1 {{ $index != 0 ? 'wow fadeInUp' : '' }}">
                <div class="w3agile-top">
                    <div class="col-md-3 w3agile-left">
                        <ul class="post-info">
                            <li><a class="post-info__link" href="{{ route('posts.show', ['id' => $post->id]) }}"><i
                                        class="fa  fa-user" aria-hidden="true"></i>{{ $post->user->name }}</a>
                            </li>
                            <li><a class="post-info__link" href="{{ route('posts.show', ['id' => $post->id]) }}"><i
                                        class="fa fa-calendar"
                                        aria-hidden="true"></i>{{ $post->created_at->diffForHumans() }}</a>
                            </li>
                            <li><a class="post-info__link" href="{{ route('posts.show', ['id' => $post->id]) }}"><i
                                        class="fa fa-comment" aria-hidden="true"></i>{{ $post->comments->count() }}
                                    BÌNH LUẬN</a></li>
                            @auth
                                @if (Auth::user()->id == $post->user->id)
                                    <li><a class="post-info__link btn-delete"
                                            data-url="{{ route('posts.destroy', ['id' => $post->id]) }}"><i
                                                class="fa fa-trash" aria-hidden="true"></i> Xóa bài viết</a></li>
                                    <li><a id="edit-post" class="post-info__link btn-edit" data-toggle="modal"
                                            data-target="#post-modal" data-title="{{ $post->title }}"
                                            data-content="{{ $post->content }}" data-id="{{ $post->id }}}"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa bài viết</a></li>
                                @endif
                            @endauth
                            <li><a href="
                                    @auth 
                                        {{ Auth::user()->id == $post->user_id ? route('posts.toogleStatus', ['id' => $post->id]) : route('posts.show', ['id' => $post->id]) }} 
                                    @endauth
                                    @guest
                                        {{ route('posts.show', ['id' => $post->id]) }} 
                                    @endguest
                                "
                                    class="post-info__link post-status 
                                    {{ $post->status == config('consts.post.status.solved.value') ? 'post-status-solved' : 'post-status-unsolved' }}">
                                    <i
                                        class="fa  {{ $post->status == config('consts.post.status.solved.value') ? 'fa-check-circle' : 'fa-times-circle ' }} "aria-hidden="true"></i>
                                    {{ $post->status == config('consts.post.status.solved.value') ? config('consts.post.status.solved.name') : config('consts.post.status.unsolved.name') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="col-md-9 w3agile-right">
                                <h3><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
                                </h3>
                                <div class="post-content-limit-line">{!! $post->content !!}</div>
                                <a class="agileits w3layouts" href="{{ route('posts.show', ['id' => $post->id]) }}">Xem
                                    thêm<span class="glyphicon agileits w3layouts glyphicon-arrow-right"
                                        aria-hidden="true"></span></a>
                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        @endforeach
        {{ $posts->withQueryString()->links() }}
    @endif

@endsection
@section('js')
    <script defer src="{{ asset('template_blog/js/jquery.flexslider.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $('#post-modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var modal = $(this)

            if (button.attr('id') == 'edit-post') {
                var title = button.data('title')
                var content = button.data('content')
                var id = button.data('id')

                modal.find('.modal-title').text('Sửa bài viết')
                modal.find('#title').val(title)
                modal.find('#submit-btn').text('Cập nhật')
                $('#summernote').summernote('code', content);

                var urlUpdate = '{{ route('posts.index') }}' + '/update/' + id
                modal.find('form').attr('action', urlUpdate)
            } else {
                modal.find('.modal-title').text('Tạo bài viết')
                modal.find('#submit-btn').text('Đăng bài')
                modal.find('form').trigger("reset");
                $('#summernote').summernote('reset');
                var urlUpdate = '{{ route('posts.store') }}'
                modal.find('form').attr('action', urlUpdate)
            }
        })
        $('#summernote').summernote({
            height: 100
        });
        $(function() {
            $('.select2_init').select2({
                'placeholder': 'Chọn thẻ tag',
            })

            $('.select3_init').select2({
                'placeholder': 'Chọn danh mục',
            })
        })
        $('#summernote').summernote({
            height: 400
        });
        $('#header-search-form').attr('action', '{{ route('posts.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm bài viết, tag, danh mục...');
    </script>
    <script>
        src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" >
    </script>
    <script>
        $(document).ready(function() {
            $('#search').click(function() {
                $('#toggle').fadeToggle();
            });
        });
    </script>
@endsection
