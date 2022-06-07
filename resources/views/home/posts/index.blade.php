@extends('layouts.home')
@section('title', 'Diễn đàm')
@section('css')
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
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

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <span class="mt-1 error-message"><i class="fa fa-times mr-2"></i>{{ $error }}</span> <br>
                    @endforeach
                @endif
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
    @foreach ($posts as $post)
        <div class="wthree-top-1">
            <div class="w3agile-top">
                <div class="col-md-3 w3agile-left">
                    <ul class="post-info">
                        <li><a class="post-info__link" href="#"><i class="fa  fa-user"
                                    aria-hidden="true"></i>{{ $post->user->name }}</a>
                        </li>
                        <li><a class="post-info__link" href="#"><i class="fa fa-calendar"
                                    aria-hidden="true"></i>{{ $post->created_at }}</a>
                        </li>
                        <li><a class="post-info__link" href="#"><i class="fa fa-comment"
                                    aria-hidden="true"></i>{{ $post->comments->count() }}
                                BÌNH LUẬN</a></li>
                        @auth
                            @if (Auth::user()->id == $post->user->id)
                                <li><a class="post-info__link btn-delete"
                                        data-url="{{ route('posts.destroy', ['id' => $post->id]) }}"><i class="fa fa-trash"
                                            aria-hidden="true"></i> Xóa bài viết</a></li>
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
    {{ $posts->links() }}
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
            height: 200
        });
    </script>

@endsection
