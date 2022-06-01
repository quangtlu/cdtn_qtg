@extends('layouts.home')
@section('title', 'Bài viết')
@section('content')
    @foreach($posts as $post)
        <div class="wthree-top-1">
        <div class="w3agile-top">
            @if($post->image != null)
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach(explode("|", $post->image) as $image)
                        <li>
                            <div class="w3agile_special_deals_grid_left_grid">
                                <a href="{{ route('posts.show', ['id' => $post->id]) }}"><img src="{{ asset('image/posts/'.$image) }}" class="img-responsive" alt="" /></a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>CONNECT SOCIALLY
            </section>
            <!-- flexSlider -->
            <script defer src="{{ asset('template_blog/js/jquery.flexslider.js') }}"></script>
            <script type="text/javascript">
                $(window).load(function(){
                    $('.flexslider').flexslider({
                        animation: "slide",
                        start: function(slider){
                            $('body').removeClass('loading');
                        }
                    });
                });
            </script>
            <!-- //flexSlider -->
            @endif
            <div class="w3agile-middle">
                <ul>
                    <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{ $post->created_at }}</a></li>
                    <li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>201 LIKES</a></li>
                    <li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i>15 COMMENTS</a></li>

                </ul>
            </div>
        </div>

        <div class="w3agile-bottom">
            <div class="col-md-3 w3agile-left">
                <h5>{{ $post->user->name }}</h5>
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
