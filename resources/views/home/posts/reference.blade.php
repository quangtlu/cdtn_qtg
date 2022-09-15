@extends('layouts.main')
@section('title', $post->title ?? 'Quyền sở hữu trí tuệ')
@section('css')
    <link rel="stylesheet" href="{{ asset('home/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/post/show.css') }}">
    <style>
        .w3l_categories .side-bar-heading,
        .w3l_categories .side-bar-footer,
        .post-container {
            border-radius: 0;
        }
    </style>
@endsection
@section('container')
    <div style="margin-top: 5rem; display: flex; justify-content:space-between">
        <i class="fa fa-bars only-mobile list-category-icon"></i>
        <div class="col-md-3 side-bar-left hide-on-mobile">@include('partials.home.list-category')</div>
        <div class="{{ $post->references->count ? 'col-md-7' : 'col-md-9' }} col-xs-12">
            @if ($post)
                @include('home.component.posts.single-post', ['post' => $post, 'isPostReference' => true])
                <div class="navigation-button-wrap">
                    {{-- prev --}}
                    @if ($refrenceChildCategories->first()->id <= request()->route('id') - 1)
                        <a href="{{ route('posts.getPostByCategory', ['id' => request()->route('id') - 1]) }}"
                            class="btn button-active "><i class="fa fa-step-backward"></i> Trước</a>
                    @else
                        <a disabled="disabled" class="btn button-active "><i class="fa fa-step-backward"></i> Trước</a>
                    @endif
                    {{-- next --}}
                    @if ($refrenceChildCategories->last()->id >= request()->route('id') + 1)
                        <a href="{{ route('posts.getPostByCategory', ['id' => request()->route('id') + 1]) }}"
                            class="btn button-primary">Tiếp theo <i class="fa fa-step-forward"></i></a>
                    @else
                        <a disabled="disabled" class="btn button-primary">Tiếp theo <i class="fa fa-step-forward"></i></a>
                    @endif

                </div>
                <div class="home-section" style="margin-top: 15px">
                    <h4 class="title-section-page">Top chuyên gia tư vấn</h4>
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
                                            <span
                                                class="slide-item-post-author-name limit-line-2">{{ $counselor->name }}</span>
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
            @else
                <div class="alert alert-warning alert-no-post" style="margin-top: 10px" role="alert">Không có bài viết nào
                </div>
            @endif
        </div>
        @if ($post->references->count)
            <div class="col-md-2 side-bar-left hide-on-mobile">@include('partials.home.list-referecnce', ['references' => $post->references])</div>
        @endif
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
    </script>
    <style>
        .owl-carousel .owl-item img {
            height: auto;
            width: 60%;
        }
    </style>
@endsection
