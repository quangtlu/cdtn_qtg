@extends('layouts.home')
@section('title', 'Trang chủ')
@section('content')
        <h3 class="title-post-product">Tài liệu quyền tác giả</h3>
        @foreach ($posts as $index => $post)
            <div class="panel panel-primary {{ $index != 0 ? 'wow fadeInUp' : '' }}">
                <div class="wthree-top-1">
                    @if ($post->image)
                        <div class="w3agile-top">
                            <section class="slider">
                                <div class="flexslider">
                                    <ul class="slides">
                                        @foreach (explode('|', $post->image) as $image)
                                            <li>
                                                <div class="w3agile_special_deals_grid_left_grid">
                                                    <img src="{{ asset('image/posts/' . $image) }}" class="img-responsive"
                                                        alt="" />
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </section>
                            <!-- flexSlider -->
                            <script defer src="{{ asset('template_blog/js/jquery.flexslider.js') }}"></script>
                            <script type="text/javascript">
                                $(window).load(function() {
                                    $('.flexslider').flexslider({
                                        animation: "slide",
                                        start: function(slider) {
                                            $('body').removeClass('loading');
                                        }
                                    });
                                });
                            </script>
                            <!-- //flexSlider -->
    
                            <div class="w3agile-middle">
                                <ul>
                                    <li><a href="{{ route('posts.show', ['id' => $post->id]) }}" class="text-primary"><i class="fa fa-calendar"
                                                aria-hidden="true"></i>{{ $post->created_at->diffForHumans() }}</a></li>
                                    <li><a href="{{ route('posts.show', ['id' => $post->id]) }}" class="text-success"><i class="fa fa-comment"
                                                aria-hidden="true"></i>{{ $post->comments->count() }} Bình luận</a></li>
    
                                </ul>
                            </div>
                        </div>
                    @endif
    
                    <div class="w3agile-bottom" style="padding: 2rem">
                        <div class="col-md-3 w3agile-left">
                            <ul class="post-info" style="padding:0">
                                <li><a class="post-info__link"
                                        href="{{ route('posts.getPostByUser', ['id' => $post->user->id]) }}"><i
                                            class="fa  fa-user" aria-hidden="true"></i>{{ $post->user->name }}</a>
                                </li>
                                <li><a class="post-info__link" href="{{ route('posts.show', ['id' => $post->id]) }}"><i
                                            class="fa fa-calendar"
                                            aria-hidden="true"></i>{{ $post->created_at->diffForHumans() }}</a>
                                </li>
                                <li><a class="post-info__link" href="{{ route('posts.show', ['id' => $post->id]) }}"><i
                                            class="fa fa-comment" aria-hidden="true"></i>{{ $post->comments->count() }}
                                        BÌNH LUẬN</a></li>
                            </ul>
                        </div>
                        <div class="col-md-9 w3agile-right">
                            <h3><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
                            </h3>
                            <div class="post-content-limit-line">{!! $post->content !!}</div>
                            <a class="agileits w3layouts" href="{{ route('posts.show', ['id' => $post->id]) }}">Xem
                                thêm<span class="glyphicon agileits w3layouts glyphicon-arrow-right"
                                    aria-hidden="true"></span></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $posts->withQueryString()->links() }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
    <style>
        .post-product-info {
            list-style-type: none;
            margin-bottom: 3px;
        }

        .title-post-product {
            text-transform: uppercase;
            font-size: 1.4em;
            color: #212121;
            padding-left: 0.8em;
            border-left: 3px solid #FFAC3A;
            font-weight: 600;
            margin-bottom: 20px
        }
    </style>
@endsection
@section('js')
    <script>
        $('#header-search-form').attr('action', '{{ route('home.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm bài viết...');
    </script>
@endsection
