@extends('layouts.admin')
@section('title', 'Chi tiết bài viết')
@section('css')
    <link
    rel="stylesheet"
    href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/product/show.css') }}">
@endsection
@section('js')
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        });
    </script>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <!-- product -->
        <div class="product-content product-wrap clearfix product-deatil">
            @if (empty($postImgs)) 
                <img class="no-image" src="{{ asset("image/posts/no_image.jpg") }}" alt="">                                    
            @else
                <div class="swiper">
                <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($postImgs as $item)
                            <div class="swiper-slide">
                                <img class="product-img" src="{{ asset("image/posts/$item") }}" alt="">                                    
                            </div>
                        @endforeach
                    </div>
                    @if (count($postImgs)>1)
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>                        
                    @endif
                </div>
                        
            @endif
                <!-- If we need scrollbar -->
            <div class="row" style="margin-top: 10px">
                <div class="col-md-12">
                    <h2 class="name">
                        {{ Str::ucfirst($post->title) }}
                    </h2>
                    <hr />
                    <div class="">
                        <ul>
                            <li>
                                Tác giả: {{ $post->user->name ?? 'Không xác định'}}
                            </li>
                            <li>
                                Thẻ tag:
                                @php
                                $tagsName = [];
                                    foreach ($post->tags as $tagName){
                                        $tagsName[] = $tagName->name;
                                    }
                                    echo $tagsName = implode(", ", $tagsName);
                                @endphp
                            </li>
                            <li>
                                Mục lục:
                                @php
                                $categoriesName = [];
                                    foreach ($post->categories as $categoryName){
                                        $categoriesName[] = $categoryName->name;
                                    }
                                    echo $categoriesName = implode(", ", $categoriesName);
                                @endphp
                            </li>
                            <li>
                                Nội dung:<br>
                                    {!! $post->content !!}
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    <!-- end product -->
    </div>
@endsection