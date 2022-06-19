@extends('layouts.home')
@section('title', 'Bài viết')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
    <style>
        .form-filters{
            margin-bottom: 50px;
        }
    </style>
@endsection
@section('content')
<div class="form-filters">
    <form action="{{ route('posts.index') }}" method="get">
        <div class="row col-md-12">
            <div class="col-md-3">
                <select name="tag_id" class="form-control">
                    <option value="{{ config('consts.tag.all') }}" class="filter-option-dafault">Tag</option>
                    <option value="{{ config('consts.tag.all') }}" class="filter-option-dafault">Tất cả</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}"
                            {{ request()->tag_id == $tag->id ? 'selected' : false }}>
                            {{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="category_id" id="sort" class="form-control">
                    <option value="{{ config('consts.category.all') }}" class="filter-option-dafault">Danh mục</option>
                    <option value="{{ config('consts.category.all') }}" class="filter-option-dafault">Tất cả</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request()->category_id == $category->id ? 'selected' : false }}>{{ $category->name }}
                        </option>
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
            <div class="panel-footer"></div>
        </div>
    @endauth
    @guest
        <a class="agileits w3layouts" href="{{ route('login') }}">Đăng nhập để đăng bài viết<span
                class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
    @endguest
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
                            <input type="text" name="title" class="form-control" id="title">
                            @error('title')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Thẻ tag</label>
                            <select name="tag_id[]" class="form-control select2_init" multiple>
                                <option></option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
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
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="summernote">Nội dung</label>
                            <textarea class="form-control" name="content" class="content" id="summernote" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Ảnh</label>
                            <input type="file" multiple class="form-control-file" name="image[]" id="image">
                        </div>
                        <button type="submit" id="submit-btn" class="btn-modal-post btn btn-success mb-2">Đăng bài</button>
                        <button type="button" class="btn-modal-post btn btn-danger" data-dismiss="modal">Đóng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @if (isset($posts))
        @foreach ($posts as $post)
            <div class="wthree-top-1">
                <div class="w3agile-top">
                    <div class="col-md-3 w3agile-left">
                        <ul class="post-info">
                            <li><a class="post-info__link" href="{{ route('posts.show', ['id' => $post->id]) }}"><i
                                        class="fa  fa-user" aria-hidden="true"></i>{{ $post->user->name }}</a>
                            </li>
                            <li><a class="post-info__link" href="{{ route('posts.show', ['id' => $post->id]) }}"><i
                                        class="fa fa-calendar" aria-hidden="true"></i>{{ $post->created_at }}</a>
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
                        </ul>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="col-md-9 w3agile-right">
                                <h3><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h3>
                                <div class="post-content-limit-line">{!! $post->content !!}</div>
                                <a class="agileits w3layouts" href="{{ route('posts.show', ['id' => $post->id]) }}">Xem
                                    thêm<span class="glyphicon agileits w3layouts glyphicon-arrow-right"
                                        aria-hidden="true"></span></a>
                            </div>
                        </div>
                        <div class="panel-footer"></div>
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
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
    </script>
    <script>
        $('#header-search-form').attr('action', '{{ route('posts.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm bài viết, tag, danh mục...');
    </script>
@endsection
