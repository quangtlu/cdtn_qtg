@extends('layouts.home')
@section('title', $post->title)
@section('css')
    <link rel="stylesheet" href="{{ asset('home/post/show.css') }}">
@endsection
@section('content')
    <div class="single-left1">
        <h3>{{ $post->title }}</h3>
        <ul>
            <li><span class="glyphicon glyphicon-user" aria-hidden="true"></span><a href="{{ route('posts.getPostByUser', ['id' => $post->user->id]) }}">{{ $post->user->name }}</a>
            </li>
            <li title="
                                    @foreach ($post->tags as $tag) {{ $tag->name }} | @endforeach"><span
                    class="glyphicon glyphicon-tag" aria-hidden="true"></span><a href="#tag">{{ $post->tags->count() }}
                    Tags</a></li>
            <li><span class="fa fa-comment" aria-hidden="true"></span><a href="#{{ $post->comments->count() > 0 ? $post->comments->first()->id : 'comments'}}">{{ $post->comments->count() }} bình
                    luận</a></li>
            <li><span class="fa fa-list-alt" aria-hidden="true"></span><a href="#category">{{ $post->categories->count() }} Danh mục</a></li>
            <li><span class="fa fa-calendar" aria-hidden="true"></span><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->created_at->diffForHumans() }}</a></li>
        </ul>
        <p>{!! $post->content !!}</p>
    </div>
    @if ($post->image != null)
        <div class="w3agile-top">
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach (explode('|', $post->image) as $image)
                            <li>
                                <div class="w3agile_special_deals_grid_left_grid">
                                    <img src="{{ asset('image/posts/' . $image) }}" class="img-responsive" alt="" />
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>
    @endif
    <div class="category-tag">
        <ul id="category" class="tag">
            <li class="li-category-tag">
                <span style="font-size:18px">Danh mục: </span>
                @foreach ($post->categories as $category)
                    <a href="{{ route('posts.getPostByCategory', ['id' => $category->id]) }}">{{ $category->name }}</a>
                @endforeach
            </li>
        </ul>
        <ul id="tag" class="tag" style="margin-top:0 !important">
            <li class="li-category-tag">
                <span style="margin-bottom:5px; font-size:18px">Tags: </span>
                @foreach ($post->tags as $tag)
                    <a href="{{ route('posts.getPostByTag', ['id' => $tag->id]) }}">{{ $tag->name }}</a>
                @endforeach
            </li>
        </ul>
    </div>
    <div id="comments" class="comments">
        <h3 style="margin-top: 50px">Bình luận</h3>
        <div class="comments-grids">
            @foreach ($comments as $comment)
                <div id="{{ $comment->id }}" class="comments-grid">
                    <div class="comments-grid-left">
                        <img src="/image/profile/{{ $comment->user->image }}" alt=" " class="img-responsive" />
                    </div>
                    <div class="comments-grid-right">
                        <h4><a href="{{ route('posts.getPostByUser', ['id' => $comment->user->id]) }}">{{ $comment->user->name }}</a></h4>
                        <ul>
                            <li><a href="#{{ $comment->id }}">{{ $comment->created_at->diffForHumans() }}</a><i>|</i></li>
                            <li>
                                @auth
                                    <a class="rep-comment comment-action-link"
                                        data-userName="{{ $comment->user->name }}">Trả lời</a>
                                @endauth
                                @guest
                                    <a class="rep-comment comment-action-link" href="{{ route('login') }}">Trả lời</a>
                                @endguest
                                <i>|</i>
                            </li>
                            @auth
                                @if ($comment->user->id == Auth::user()->id)
                                    <li><a class="comment-action-link btn-delete-comment"
                                            data-url="{{ route('comments.destroy', ['id' => $comment->id]) }}">Xóa
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>|</li>
                                    </li>
                                    <li><a class="comment-action-link btn-edit-comment">Chỉnh sửa
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a></li>
                                    </li>
                                @endif
                            @endauth
                        </ul>
                        <p class="comment-content">{{ $comment->comment }}</p>
                        @auth
                            @if ($comment->user->id == Auth::user()->id)
                                <div class="leave-coment-form edit-comment-form">
                                    <form action="{{ route('comments.update', ['id' => $comment->id]) }}" method="post">
                                        @csrf
                                        <textarea name="comment" placeholder="Nhập bình luận..." required="">{{ $comment->comment }}</textarea>
                                        @error('comment')
                                            <span class="mt-1 text-danger">{{ $message }}</span>
                                        @enderror
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <div class="w3_single_submit">
                                            <input type="submit" value="Cập nhật">
                                        </div>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                    <div class="clearfix"> </div>
                </div>
            @endforeach
            {{ $comments->links() }}
        </div>
    </div>
    @guest
        <a class="agileits w3layouts" href="{{ route('login') }}">Đăng nhập để bình luận<span
                class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
    @endguest
    @auth
        <div class="leave-coment-form">
            <form action="{{ route('comments.store') }}" method="post">
                @csrf
                <textarea id="leave-coment" name="comment" placeholder="Nhập bình luận..." required=""></textarea>
                @error('comment')
                    <span class="mt-1 text-danger">{{ $message }}</span>
                @enderror
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="w3_single_submit">
                    <input type="submit" value="Bình luận">
                </div>
            </form>
        </div>
    @endauth
@endsection
@section('js')
    <script defer src="{{ asset('template_blog/js/jquery.flexslider.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script type="text/javascript">
        $(window).load(function() {

            $('.btn-edit-comment').on('click', function() {
                $(this).closest('.comments-grid-right').children('.edit-comment-form').toggle()
                $(this).closest('.comments-grid-right').children('.comment-content').toggle()
            })
            $('.rep-comment').on('click', function() {
                var userName = $(this).attr('data-userName')
                $('#leave-coment').text(userName)
                $([document.documentElement, document.body]).animate({
                    scrollTop: $("#leave-coment").offset().top
                }, 1000);

            })
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider) {
                    $('body').removeClass('loading');
                }
            });

        });
    </script>
@endsection
<style>
    ul.tag li a
    {
        padding: 5px !important;
        font-size: 10px !important;
        font-weight: bold;
    }
    .comments-grid-left
    {
        width: 10% !important;
    }
    .comments-grid-right
    {
        width: 85% !important;
    }
    .comments-grid-left img
    {
        padding: 0 !important;
        border: 1px solid #ffac3a !important;
        border-radius: 50% !important;
    }
</style>
