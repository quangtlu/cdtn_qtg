@extends('layouts.home')
@section('title', $product->name)
@section('css')
    <link rel="stylesheet" href="{{ asset('home/post/show.css') }}">
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
@endsection
@section('content')
    <div class="single-left1">
        <h3>{{ $product->name }}</h3>
        <ul>
            <li>
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span><a
                    href="#">{{ $product->authors->count() }}Tác giả</a>
            </li>
            <li title="
                @foreach ($product->categories as $category) {{ $category->name }} | @endforeach">
                <span class="glyphicon glyphicon-tag" aria-hidden="true"></span><a
                    href="#">{{ $product->categories->count() }}
                    Danh mục</a>
            </li>
            <li><span class="fa fa-calendar" aria-hidden="true"></span><a href="#">{{ $product->created_at }}</a>
            </li>
        </ul>
        <div class="row wow fadeInUp">
            <div class="col-md-12">
                <h2 class="name">
                    {{-- {{ $product->name }} --}}
                </h2>
                <hr />
                <div class="">
                    <ul>
                        <li>Tác phẩm: {{ $product->name }}</li>
                        <br>
                        <li style="margin-top: 10px">
                            Tác giả:
                            @if ($product->authors->count())
                                @foreach ($product->authors as $index => $author)
                                    {{ $index != $product->authors->count() - 1 ? $author->name . ' ,' : $author->name }}
                                @endforeach
                            @else
                                Chưa xác định
                            @endif
                        </li>
                        <br>
                        <li style="margin-top: 10px">
                            Chủ sở hữu: {{ $product->owner->name ?? '' }}
                        </li>
                        <br>
                        <li style="margin-top: 10px">
                            Ngày sáng tác: {{ $product->pub_date }}
                        </li>
                        <br>
                        <li style="margin: 10px 0">
                            Ngày đăng kí bản quyền: {{ $product->regis_date }}
                        </li>
                        <br>
                        <li>
                            Mô tả:<br>
                            {!! $product->description !!}
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    @if ($product->image != null)
        <div class="w3agile-top wow fadeInUp">
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach (explode('|', $product->image) as $image)
                            <li>
                                <div class="w3agile_special_deals_grid_left_grid">
                                    <img src="{{ asset('image/products/' . $image) }}" class="img-responsive"
                                        alt="" />
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>
    @endif
    <div class="category-tag">
        <ul class="tag">
            <li class="li-category-tag">
                <span style="font-size:18px">Danh mục: </span>
                @foreach ($product->categories as $category)
                    <a
                        href="{{ route('products.getProductByCategory', ['id' => $category->id]) }}">{{ $category->name }}</a>
                @endforeach
            </li>
        </ul>
        <ul class="tag" style="margin-top:0 !important">
            <li class="li-category-tag">
                <span style="margin-bottom:5px; font-size:18px">Tác giả: </span>
                @foreach ($product->authors as $author)
                    <a href="#" data-toggle="modal"
                        data-target="#exampleModal{{ $author->id }}">{{ $author->name }}</a>

                    <div class="modal fade" id="exampleModal{{ $author->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Thông tin tác giả</h4>
                                </div>
                                <div class="modal-body" style="margin-left: 20px">
                                    <h4 style="padding-top:10px">Họ và tên: {{ $author->name }}</h4>
                                    <h4 style="padding-top:10px">Giới tính: {{ $author->gender }}</h4>
                                    <h4 style="padding-top:10px">Ngày sinh: {{ $author->dob }}</h4>
                                    <h4 style="padding-top:10px">Email: {{ $author->email }}</h4>
                                    <h4 style="padding-top:10px">Điện thoại: {{ $author->phone }}</h4>
                                </div>
                                <div class="modal-footer">
                                    <a class="agileits w3layouts" href="{{ route('products.getProductByAuthor', ['id' => $author->id]) }}">Xem các tác phẩm
                                        <span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </li>
        </ul>
        <ul class="tag" style="margin-top:0 !important">
            <li class="li-category-tag">
                <span style="margin-bottom:5px; font-size:18px">Chủ sở hữu: </span>
                @if (!empty($product->owner_id))
                    <a href="#" data-toggle="modal" data-target="#exampleModal">{{ $product->owner->name }}</a>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h3 class="modal-title" id="exampleModalLabel">Thông tin chủ sở hữu</h3>
                                </div>
                                <div class="modal-body">
                                    <h4 style="padding-top: 10px">Họ tên: {{ $product->owner->name }}</h4>
                                    <h4 style="padding-top: 10px">Email: {{ $product->owner->email }}</h4>
                                    <h4 style="padding-top: 10px">Số Điện thoại: {{ $product->owner->name }}</h4>
                                    
                                </div>
                                <div class="modal-footer">
                                    <a class="agileits w3layouts" href="{{ route('products.getProductByOwner', ['id' => $product->owner->id]) }}">Xem các tác phẩm
                                        <span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </li>
        </ul>
    </div>
    <div class="wow fadeInUp" style="margin-top: 30px">
        <h3 class="title-relate">Tác phẩm liên quan</h3>
        @if (isset($productRelates))
            @foreach ($productRelates as $product)
                <div class="wthree-top-1">
                    <div class="w3agile-top">
                        <div class="col-md-3 w3agile-left">
                            <ul class="post-info">
                                <li>
                                    <a class="post-info__link"
                                        href="{{ route('products.show', ['id' => $product->id]) }}">
                                        <i class="fa  fa-user" aria-hidden="true"></i>
                                        @if ($product->authors->count())
                                            @foreach ($product->authors as $index => $author)
                                                {{ $index != $product->authors->count() - 1 ? $author->name . ' ,' : $author->name }}
                                            @endforeach
                                        @else
                                            Chưa xác định
                                        @endif
                                    </a>
                                </li>
                                <li><a class="post-info__link"
                                        href="{{ route('products.show', ['id' => $product->id]) }}">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>{{ $product->created_at }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <div class="col-md-9 w3agile-right">
                                    <h3><a
                                            href="{{ route('products.show', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="post-content-limit-line">{!! $product->description !!}</div>
                                    <a class="agileits w3layouts"
                                        href="{{ route('products.show', ['id' => $product->id]) }}">Xem
                                        thêm<span class="glyphicon agileits w3layouts glyphicon-arrow-right"
                                            aria-hidden="true"></span></a>
                                </div>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            @endforeach
            {{ $productRelates->links() }}
        @endif
    </div>
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
    .comments-grid-left {
        width: 10% !important;
    }

    .comments-grid-right {
        width: 85% !important;
    }

    .comments-grid-left img {
        padding: 0 !important;
        border: 1px solid #ffac3a !important;
        border-radius: 50% !important;
    }

    .title-relate {
        text-transform: uppercase;
        font-size: 1.4em;
        color: #212121;
        padding-left: 0.8em;
        border-left: 3px solid #FFAC3A;
        font-weight: 600;
    }
</style>
