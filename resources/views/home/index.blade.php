@extends('layouts.one-column')
@section('title', 'Trang chủ')
@section('css')
    <link rel="stylesheet" href="{{ asset('home/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/post/show.css') }}">
@endsection
@section('content')
    <div class="container">
        {{-- canvas slide --}}
        <div class="hide-on-mobile"
            style="position: relative; width: 100%; height: 0; padding-top: 56.2500%;
 padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
 border-radius: 8px; will-change: transform;">
            <iframe loading="lazy"
                style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFJLyhkiQQ&#x2F;view?embed"
                allowfullscreen="allowfullscreen" allow="fullscreen">
            </iframe>
        </div>
        <div class="home-section" style="margin-top: 3rem">
            <h4 class="title-section-page">Các chủ đề được quan tâm nhất</h4>
            <ul class="top-list">
                <div class="row">
                    @foreach ($categories as $index => $category)
                        <div class="col-md-6" style="padding-left: 0">
                            <div style="display: flex; align-items:center">
                                <img src="{{ asset('image/home/number/top-') . ($index + 1) . '.png' }}" alt=""
                                    class="col-md-6 col-xs-3 number-image">
                                <div class="col-md-6 col-xs-9 top-category-name">
                                    <a style="font-size: 20px;" class="top-item__link"
                                        href="{{ route('posts.getPostByCategory', ['id' => $category->id]) }}">
                                        {{ $category->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-6" style="padding-left: 0">
                        <div style="display: flex; align-items:center">
                            <img src="{{ asset('image/home/number/see-more.png') }}" alt=""
                                class="col-md-6 col-xs-3 number-image">
                            <div class="col-md-6 col-xs-9 top-category-name">
                                <a data-toggle="tooltip" data-placement="right" title="Xem thêm các chủ đề"
                                    style="font-size: 20px;" class="top-item__link"
                                    href="{{ route('posts.getPostByCategory', ['id' => $refrenceChildCategories->first()->id]) }}">
                                    Xem thêm
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
        <div class="home-section">
            <h4 class="title-section-page">Những thảo luận được quan tâm nhất</h4>
            <div id="carousel-example-generic"
                style="background-image: url({{ asset('image/home/slide/forum_bg.jpeg') }}); background-repeat: no-repeat;
                    background-size: cover;}"
                class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner carousel-top-post" role="listbox">
                    @foreach ($posts as $index => $post)
                        <div class="item {{ $index == 0 ? 'active' : '' }} row">
                            <div class="slide-item-post-wrap col-md-8">
                                <span class="top-post-slide-title limit-line-2">{{ $post->title }}</span>
                                <img class="slide-item-post-authour-avt"
                                    src="{{ asset('image/profile') . '/' . $post->user->image }}" alt="">
                                <span class="slide-item-post-author-name limit-line-2">{{ $post->user->name }}</span>
                                <span class="slide-item-post-content limit-line-3">{!! $post->content !!}</span>
                                <a href="{{ route('posts.show', ['id' => $post->id]) }}"
                                    class="btn button-primary-outline btn-sm">Xem
                                    thêm</a>
                            </div>
                            <ul style="padding-left: 0" class="slide-comment-list col-md-4 hide-on-mobile">
                                @foreach ($post->comments->take(10) as $comment)
                                    <li class="comment-item">
                                        <div style="align-items: start" class="comment-item-content">
                                            <a style="padding-left: 0" class="col-md-2 comment-item-content-left"
                                                href="{{ route('posts.getPostByUser', ['id' => $comment->user_id]) }}">
                                                <img src="{{ asset('image/profile') . '/' . $comment->user->image }}"
                                                    alt="" class="user-post-avt">
                                            </a>
                                            <div class="col-md-10 comment-item-content-right">
                                                <ul class="comment-item-content-right-list">
                                                    @if ($comment->user_id == $post->user_id)
                                                        <li
                                                            class="comment-item-content-right-list__item comment-item-author">
                                                            <i class="fa fa-pencil"></i>
                                                            <span>Tác giả</span>
                                                        </li>
                                                    @endif
                                                    <li class="comment-item-content-right-list__item">
                                                        <a class="comment-item-content-left"
                                                            href="{{ route('posts.getPostByUser', ['id' => $comment->user_id]) }}">
                                                            <span
                                                                class="comment-user-name">{{ $comment->user->name }}</span>
                                                        </a>
                                                        @if ($comment->status == config('consts.post.status.solved.value'))
                                                            <a data-toggle="tooltip" data-placement="top"
                                                                title="{{ $comment->status_name }}"
                                                                class="{{ $comment->status_class }}" href="">
                                                                <i class="fa {{ $comment->status_icon_class }}"></i>
                                                            </a>
                                                        @endif
                                                    </li>
                                                    <li
                                                        class="comment-item-content-right-list__item comment-item-body limit-line-2">
                                                        {{ $comment->comment }}
                                                    </li>
                                                    <a data-toggle="tooltip" data-placement="bottom"
                                                        title="{{ $comment->created_at }}"
                                                        style="color: rgb(131, 125, 125);"
                                                        class="comment-item-content-right-list__item">
                                                        {{ $comment->created_at->diffForHumans() }}
                                                    </a>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                    <ol class="carousel-indicators">
                        @foreach ($posts as $index => $post)
                            <li data-target="#carousel-example-generic" data-slide-to="{{ $index }}"
                                class="{{ $index == 0 ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left arow-slide-icon arow-slide-left"
                        aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right arow-slide-icon arow-slide-right"
                        aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="home-section">
            <h4 class="title-section-page">Chuyên gia tư vấn nổi bật</h4>
            <div class="owl-carousel owl-theme owl-loaded"
                style="background-image: url(https://thanglong.edu.vn/sites/default/files/2020-05/facilities-top-01.jpg);
                background-size:cover; background-repeat:repeat">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        @foreach ($counselors as $index => $counselor)
                            <div class="owl-item">
                                <div class="slide-item-post-wrap">
                                    <img class="slide-item-post-authour-avt"
                                        src="{{ asset('image/profile') . '/' . $counselor->image }}" alt="">
                                    <span class="slide-item-post-author-name limit-line-2">{{ $counselor->name }}</span>
                                    <div class="row">
                                        <a href="" class="btn button-active">Hẹn tư
                                            vấn</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('home/OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 5000,
            margin: 20,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: true
                },
                1000: {
                    items: 3,
                    nav: true,
                    loop: true
                }
            }
        })

        $('.carousel').carousel({
            interval: 5000
        })
        $('#search').click(function() {
            $('#toggle').fadeToggle();
        });

        $('#header-search-form').attr('action', '{{ route('posts.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm bài viết theo tiêu đề, nội dung, tác giả...');
    </script>
    <style>
        .carousel-control {
            width: 0 !important;
        }

        .arow-slide-icon {
            font-size: 20px !important;
            color: var(--red-color);
        }

        .arow-slide-left {
            left: auto !important;
            right: 0 !important;
        }

        .arow-slide-right {
            right: auto !important;
        }

        .owl-carousel .owl-item img {
            height: auto;
            width: 60%;
        }
    </style>
@endsection
