@extends('layouts.home')
@section('title', $post->title)
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('home/post/show.css') }}">
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
@endsection
@section('content')
    <div class="single-left1 panel" style="padding: 10px !important">
        <h3 class="title-relate">{{ $post->title }}</h3>
        <ul>
            <li><span class="glyphicon glyphicon-user" aria-hidden="true"></span><a
                    href="{{ route('posts.getPostByUser', ['id' => $post->user->id]) }}">{{ $post->user->name }}</a>
            </li>
            <li><span class="glyphicon glyphicon-tag" aria-hidden="true"></span><a
                    href="#tag">{{ $post->tags->count() }}
                    Tags</a>
            </li>
            <li><span class="fa fa-comment" aria-hidden="true"></span><a
                    href="#{{ $post->comments->count() > 0 ? $post->comments->first()->id : 'comments' }}">{{ $post->comments->count() }}
                    bình
                    luận</a></li>
            <li><span class="fa fa-list-alt" aria-hidden="true"></span><a
                    href="#category">{{ $post->categories->count() }} Danh mục</a></li>
            <li><span class="fa fa-clock-o" aria-hidden="true"></span><a
                    href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->created_at->diffForHumans() }}</a>
            </li>
        </ul>
        <div style="padding-top: 10px">{!! $post->content !!}</div>
    </div>
    @if ($post->image)
        <div class="w3agile-top wow fadeInUp">
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
        <ul id="tag" class="tag" style="margin-top:0 !important; margin-bottom:0 !important">
            <li class="li-category-tag">
                <span style="margin-top:10px; font-size:18px">Tags: </span>
                @foreach ($post->tags as $tag)
                    <a href="{{ route('posts.getPostByTag', ['id' => $tag->id]) }}">{{ $tag->name }}</a>
                @endforeach
            </li>
        </ul>
        <span style="margin-top:10px; font-size:18px">Trạng thái : </span>
        @foreach (config('consts.post.status') as $item)
            @if ($post->status == $item['value'])
                <a class="{{ $item['className'] }}" 
                href="
                {{ Auth::user() && Auth::user()->id == $post->user_id 
                    && ($post->status == config('consts.post.status.unsolved.value') || $post->status == config('consts.post.status.solved.value')) 
                    ? route('posts.toogleStatus', ['id' => $post->id]) 
                    : route('posts.show', ['id' => $post->id]) 
                }}">
                <i class="fa {{ $item['classIcon'] }}" aria-hidden="true"></i>
                {{ $item['name'] }}</a>
                </a>
            @endif
        @endforeach
    </div>
    @auth
        @if (Auth::user()->id == $post->user_id)
            @if($post->chatroom)
                <a class="btn btn-success" style="margin-top: 10px"
                href="{{ route('messenger.show', ['id' => $post->chatroom->id]) }}">Trò chuyện với chuyên gia tư vấn <i
                    class="fa fa-comments"></i></a>
            @endif
            <button style="margin-top:10px" id="edit-post" class="btn btn-primary" data-toggle="modal" data-target="#edit-modal">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                Sửa bài viết
            </button>
            @include('home.component.posts.modal-edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags])
        @endif
        @role('mod|admin')
            @if ($post->chatroom)
                <button style="margin-top:10px" class="btn btn-success">Đã kết nối với chuyên gia tư vấn <i
                        class="fa fa-check-circle" aria-hidden="true"></i></button>
            @else
                <button style="margin-top: 10px" data-toggle="modal" data-target="#post-modal" class="btn btn-success">Kết nối
                    với
                    chuyên gia <i class="fa fa-comments"></i></button>
                <div class="modal fade" id="post-modal" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="post-modalLabel">Kết nối với chuyên gia tư vấn</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('posts.connectToCounselor', ['id' => $post->id]) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Chuyên gia tư vấn</label>
                                        <select name="counselor_id" class="form-control">
                                            @foreach ($counselors as $counselor)
                                                <option value="{{ $counselor->id }}">{{ $counselor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" id="submit-btn" class="btn-modal-post btn btn-success mb-2">Kết
                                        nối</button>
                                    <button type="button" class="btn-modal-post btn btn-danger"
                                        data-dismiss="modal">Đóng</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endrole
    @endauth

    {{-- Comment --}}
    <div id="comments" class="comments wow fadeInUp">
        <h3 class="title-relate" style="margin-top: 50px">Bình luận</h3>
        @include('home.component.posts.comments', ['post' => $post])
    </div>
    <div class="leave-coment-form wow fadeInUp">
        <form id="form-create-comment" action="{{ route('comments.store') }}" method="post">
            @csrf
            <textarea id="leave-coment" name="comment" placeholder="Nhập bình luận..." required=""></textarea>
            @error('comment')
                <span class="mt-1 text-danger">{{ $message }}</span>
            @enderror
            <input type="hidden" name="user_id" value="{{ Auth::user() && Auth::user()->id }}">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="w3_single_submit">
                <input type="submit" value="Bình luận">
            </div>
        </form>
    </div>
    <div class="wow fadeInUp" style="margin-top: 30px">
        <h3 class="title-relate">Bài viết liên quan</h3>
        @include('home.component.posts.list', ['posts' => $postRelates])
    </div>
@endsection
@section('js')
    <script src="{{ asset('template_blog/js/jquery.flexslider.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $('.summernote').summernote({
            height: 200
        });
        $('.select2_init').select2()
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
    </script>
@endsection
<style>
    ul.tag li a {
        padding: 5px !important;
        font-size: 10px !important;
        font-weight: bold;
    }

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

    .relate-post:hover {
        color: #ffac3a !important;
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
