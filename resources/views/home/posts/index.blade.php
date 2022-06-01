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
                    <img id="avt-user" src="{{ asset('image/profile/'.Auth::user()->image)}}" alt="">
                </div>
                <div class="col-md-11">
                    <span data-toggle="modal" data-target="#post-modal"  id="input-post" class="form-control">
                        {{ Auth::user()->name }} ơi, đăng bài lên diễn đàm để cùng thảo luận nào
                    </span>
                </div>
            </div>
        </div>
        <div class="panel-footer"></div>
    </div>
    @endauth
    @guest
        <a class="agileits w3layouts" href="{{route('login')}}">Đăng nhập để đăng bài viết<span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
    @endguest
    <div class="modal fade" id="post-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Tạo bài viết</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category_name">Tiêu đề</label>
                            <input type="text" name="title" class="form-control" id="category_name">
                        </div>
                        <div class="form-group">
                            <label for="category_name">Nội dung</label>
                            <textarea class="form-control" name="content" id="summernote" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category_name">Ảnh</label>
                            <input type="file" multiple class="form-control-file" name="image[]" id="" cols="30" rows="5">
                        </div>
                            <button type="submit" class="btn-modal-post btn btn-success mb-2">Đăng bài</button>
                            <button type="button" class="btn-modal-post btn btn-danger" data-dismiss="modal">Đóng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach($posts as $post)
    <div class="wthree-top-1">
        <div class="w3agile-top">
            <div class="col-md-3 w3agile-left">
                <ul class="post-info">
                    <li><a class="post-info__link" href="#"><i class="fa  fa-user" aria-hidden="true"></i>{{ $post->user->name }}</a></li>
                    <li><a class="post-info__link" href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{ $post->created_at }}</a></li>
                    <li><a class="post-info__link" href="#"><i class="fa fa-comment" aria-hidden="true"></i>15 COMMENTS</a></li>
                </ul>
            </div>
            <div class="col-md-9 w3agile-right">
                <h3><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h3>
                <div class="post-content-limit-line">{!! $post->content !!}</div>
                <a class="agileits w3layouts" href="{{ route('posts.show', ['id' => $post->id]) }}">Xem thêm<span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
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
        $(window).load(function(){
            $('#exampleModal').on('show.bs.modal', function (event) {})
            $('#summernote').summernote({
                height: 200
            });
        });
    </script>

@endsection
