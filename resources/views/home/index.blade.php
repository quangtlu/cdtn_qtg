@extends('layouts.home')
@section('title', 'Home')
@section('content')
        <h3 class="title-post-product">Bài viết mới nhất</h3>
        @foreach ($posts as $post)
        <div class="panel panel-primary">
        <div class="wthree-top-1">
                @if ($post->image)
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

                        <div class="w3agile-middle">
                            <ul>
                                <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{ $post->created_at }}</a></li>
                                <li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i>{{ $post->comments->count() }}</a></li>

                            </ul>
                        </div>
                    </div>
                @endif

                <div class="w3agile-bottom" style="padding-top: 0px">
                    <div class="col-md-3 w3agile-left">
                        <li class="post-product-info">
                            <i class="fa fa-user" style="margin-right:4px" aria-hidden="true"></i>{{ $post->user->name }}
                        </li>
                        <li class="post-product-info">
                            <i class="fa fa-calendar" style="margin-right:4px" aria-hidden="true"></i>{{ $post->created_at }}
                        </li>
                        <li class="post-product-info">
                            <i class="fa fa-comment" style="margin-right:4px" aria-hidden="true"></i>{{ $post->comments->count() }}
                        </li>
                        <li class="post-product-info">
                            <a href="
                                @auth 
                                    {{ Auth::user()->id == $post->user_id ? route('posts.toogleStatus', ['id' => $post->id]) : route('posts.show', ['id' => $post->id])  }} 
                                @endauth
                                @guest
                                    {{ route('posts.show', ['id' => $post->id])  }} 
                                @endguest
                            "  
                            class="post-info__link post-status 
                                {{ $post->status == config('consts.post.status.solved.value') ? 'post-status-solved' : 'post-status-unsolved' }}">
                                <i class="fa  {{ $post->status == config('consts.post.status.solved.value') ? 'fa-check-circle' : 'fa-times-circle ' }} "aria-hidden="true"></i>
                                {{ $post->status == config('consts.post.status.solved.value')? config('consts.post.status.solved.name'): config('consts.post.status.unsolved.name') }}
                            </a>
                        </li>
                    </div>
                    <div class="col-md-9 w3agile-right">
                        <h3><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h3>
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
        <h3 class="title-post-product" style="margin-top:50px">Tác phẩm mới nhất</h3>
        @foreach ($products as $product)
        <div class="panel panel-primary">
            <div class="wthree-top-1">
                @if ($product->image)
                    <div class="w3agile-top">
                        <section class="slider">
                            <div class="flexslider">
                                <ul class="slides">
                                        @foreach (explode('|', $product->image) as $image)
                                            <li>
                                                <div class="w3agile_special_deals_grid_left_grid">
                                                    <img src="{{ asset('image/products/' . $image) }}" class="img-responsive" alt="" />
                                                </div>
                                            </li>
                                        @endforeach
                                </ul>
                            </div>
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

                        <div class="w3agile-middle">
                            <ul>
                                <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{ $product->created_at }}</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-user" aria-hidden="true"></i>{{ $product->author->count() }} <span>Tác giả</span></a></li>
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="w3agile-bottom" style="padding-top: 0px">
                    <div class="col-md-3 w3agile-left">
                        <li class="post-product-info">
                            <i class="glyphicon glyphicon-user" style="margin-right:4px" aria-hidden="true"></i>{{ $product->author->count() > 1 ? $product->author->first()->name . ',...' : $product->author->first()->name }}
                        </li>
                        <li class="post-product-info">
                            <i class="fa fa-calendar" style="margin-right:4px" aria-hidden="true"></i>{{ $product->created_at }}
                        </li>
                    </div>
                    <div class="col-md-9 w3agile-right">
                        <h3><a href="{{ route('products.show', ['id' => $product->id]) }}">{{ $product->title }}</a></h3>
                        <div class="post-content-limit-line">{!! $product->description !!}</div>
                        <a class="agileits w3layouts" href="{{ route('products.show', ['id' => $product->id]) }}">Xem
                            thêm<span class="glyphicon agileits w3layouts glyphicon-arrow-right"
                                aria-hidden="true"></span></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        @endforeach
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
<style>
    .post-product-info{
        list-style-type: none;
        margin-bottom: 3px;
    }
    .title-post-product {
        text-align: center;
        margin-bottom: 30px;
    }
</style>
@endsection