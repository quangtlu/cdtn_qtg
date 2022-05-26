@extends('layouts.admin')
@section('title', 'Chi tiết tác phẩm')
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
        @include('partials.content_header', ['name' => 'Tác phẩm', 'key' => 'Chi tiết'])
    <!-- product -->
        <div class="product-content product-wrap clearfix product-deatil">
            @if (empty($productImgs)) 
                <img class="no-image" src="{{ asset("image/products/no_image.jpg") }}" alt="">                                    
            @else
                <div class="swiper">
                <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($productImgs as $item)
                            <div class="swiper-slide">
                                <img class="product-img" src="{{ asset("image/products/$item") }}" alt="">                                    
                            </div>
                        @endforeach
                    </div>
                    @if (count($productImgs)>1)
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>                        
                    @endif
                </div>
                        
            @endif
                <!-- If we need scrollbar -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="name">
                        {{ $product->name }}
                    </h2>
                    <hr />
                    <div class="">
                        <ul>
                            <li>
                                Tác giả:
                                    @php
                                        foreach ($product->author as $value){
                                            $a[] = $value->name;

                                        }
                                        echo $str = implode(", ", $a);
                                    @endphp
                            </li>
                            <li>
                                Chủ sở hữu: {{ $product->owner->name }}
                            </li>
                            <li>
                                Ngày sáng tác: {{ $product->pub_date }}
                            </li>
                            <li>
                                Ngày đăng kí bản quyền: {{ $product->regis_date }}
                            </li>
                            <li>
                                Mô tả:<br>
                                    {!! $product->description !!}
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    <!-- end product -->
    </div>
@endsection