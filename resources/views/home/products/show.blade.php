@extends('layouts.home')
@section('title', $product->name)
@section('css')
    <link rel="stylesheet" href="{{ asset('home/post/show.css') }}">
@endsection
@section('content')
    <div class="single-left1">
        <h3>{{ $product->name }}</h3>
        <ul>
            <li title="
                    @foreach ($product->author as $author) {{ $author->name }} | @endforeach">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span><a href="#">{{ $product->author->count() }}
                    Tác giả</a></li>
            <li title="
                                    @foreach ($product->categories as $category) {{ $category->name }} | @endforeach"><span
                    class="glyphicon glyphicon-tag" aria-hidden="true"></span><a href="#">{{ $product->categories->count() }}
                    Danh mục</a></li>
            <li><span class="fa fa-calendar" aria-hidden="true"></span><a href="#">{{ $product->created_at }}</a></li>
        </ul>
        <div class="row">
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
                                @php
                                    foreach ($product->author as $value){
                                        $a[] = $value->name;

                                    }
                                    echo $str = implode(", ", $a);
                                @endphp
                        </li>
                        <br>
                        <li style="margin-top: 10px">
                            Chủ sở hữu: {{ ($product->owner->name) ?? '' }}
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
        </div>
    @endif
    <div class="category-tag">
        <ul class="tag">
            <li class="li-category-tag">
                <span style="font-size:18px">Danh mục: </span>
                @foreach ($product->categories as $category)
                    <a href="{{ route('products.getProductByCategory', ['id' => $category->id]) }}">{{ $category->name }}</a>
                @endforeach
            </li>
        </ul>
        <ul class="tag" style="margin-top:0 !important">
            <li class="li-category-tag">
                <span style="margin-bottom:5px; font-size:18px">Tác giả: </span>
                @foreach ($product->author as $author)
                    <a href="{{ route('products.getProductByAuthor', ['id' => $author->id]) }}">{{ $author->name }}</a>
                @endforeach
            </li>
        </ul>
        <ul class="tag" style="margin-top:0 !important">
            <li class="li-category-tag">
                <span style="margin-bottom:5px; font-size:18px">Chủ sở hữu: </span>
                @if (!empty($product->owner_id))
                    <a href="{{ route('products.getProductByOwner', ['id' => $product->owner->id]) }}">{{ $product->owner->name }}</a>
                    
                @endif
            </li>
        </ul>
    </div>
    {{-- <div class="comments">
        <h3 style="margin-top: 50px">Bình luận</h3>
        <div class="comments-grids">
            @foreach ($comments as $comment)
                <div class="comments-grid">
                    <div class="comments-grid-left">
                        <img src="/image/profile/{{ $comment->user->image }}" alt=" " class="img-responsive" />
                    </div>
                    <div class="comments-grid-right">
                        <h4><a href="#">{{ $comment->user->name }}</a></h4>
                        <ul>
                            <li>{{ $comment->created_at }}<i>|</i></li>
                            <li>
                                @auth
                                    <a class="rep-comment comment-action-link"
                                        data-userName="{{ $comment->user->name }}">Trảlời</a>
                                @endauth
                                @guest
                                    <a class="rep-comment comment-action-link" href="{{ route('login') }}">Trảlời</a>
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
    @endauth --}}
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
        font-size: 8px !important;
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
