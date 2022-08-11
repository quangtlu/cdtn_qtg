<div class="post-container">
    {{-- Post --}}
    <div class="post-wrap">
        @if (!isset($isHidePostHeader))
            <div class="post-header">
                <div class="user-post-wrap">
                    <img src="{{ asset('image/profile') . '/' . $post->user->image }}" class="user-post-avt">
                    <div class="post-other-info">
                        <span class="user-post-name">{{ $post->user->name }}</span>
                        <a href="{{ route('posts.show', ['id' => $post->id]) }}"
                            class="post-date">{{ $post->created_at->diffForHumans() }}</a>
                    </div>
                </div>
                @auth
                    @if (Auth::user()->id == $post->user_id)
                        <div class="dropdown">
                            <span class="dropdown-toggle glyphicon glyphicon-option-horizontal post-control"
                                id="dropdownMenu-{{ $post->id }}" data-toggle="dropdown" aria-hidden="true" aria-haspopup="true"
                                aria-expanded="true">
                            </span>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu-{{ $post->id }}">
                                <li><a href="{{ route('posts.show', ['id' => $post->id]) }}">Xem chi tiết</a></li>
                                <li><a href="{{ route('posts.show', ['id' => $post->id]) }}">Chỉnh sửa</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a class="btn-delete" data-url="{{ route('posts.destroy', ['id' => $post->id]) }}">Xóa bài viết</a></li>
                            </ul>
                        </div>
                    @endif
                @endauth
            </div>
        @endif
        <div class="post-content ">
            <span class="post-content-title">{{ $post->title }}</span>
            <div class="post-content-body limit-line">
                {!! $post->content !!}
            </div>
            @if (strlen($post->content) > 811)
                <a href="#" class="read-more-btn">Xem thêm</a>
            @endif
        </div>
        <div class="post-image">
            @if ($post->image)
                <div id="carousel-example-generic-{{ $post->id }}" class="carousel slide"
                    data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        @foreach (explode('|', $post->image) as $index => $image)
                            <div class="item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('image/posts') . '/' . $image }}" alt="...">
                            </div>
                        @endforeach
                        <a class="left carousel-control" href="#carousel-example-generic-{{ $post->id }}"
                            role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic-{{ $post->id }}"
                            role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    {{-- Comment --}}
    <div class="post-comment">
        <div class="sort-comment">
            <span class="sort-title">Tất cả bình luận</span>
            <i class="fa fa-caret-down"></i>
        </div>
        <div class="clearfix"></div>
        @auth
            <div class="comment-input-wrap">
                <div class="col-md-1 comment-input-left">
                    <img src="{{ asset('image/profile') . '/' . Auth::user()->image }}" alt=""
                        class="user-post-avt">
                </div>
                <div class="col-md-11 comment-input-right">
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <textarea placeholder="Viết bình luận..." class="input-comment autofit"></textarea>
                    </form>
                </div>
            </div>
        @endauth
        @guest
            <a class="button-primary" href="{{ route('login') }}">Đăng nhập để bình luận</a>
        @endguest
        @if ($post->comments->count())
            <ul class="list-comment">
                @foreach ($post->comments as $comment)
                    <li class="comment-item">
                        <div class="comment-item-content">
                            <a class="comment-item-content-left"
                                href="{{ route('posts.getPostByUser', ['id' => $comment->user_id]) }}">
                                <img src="{{ asset('image/profile') . '/' . $comment->user->image }}"
                                    alt="" class="user-post-avt">
                            </a>
                            <div class="comment-item-content-right">
                                <ul class="comment-item-content-right-list">
                                    @if ($comment->user_id == $post->user_id)
                                        <li class="comment-item-content-right-list__item comment-item-author">
                                            <i class="fa fa-pencil"></i>
                                            <span>Tác giả</span>
                                        </li>
                                    @endif
                                    <li class="comment-item-content-right-list__item">
                                        <a class="comment-item-content-left"
                                            href="{{ route('posts.getPostByUser', ['id' => $comment->user_id]) }}">
                                            <span class="comment-user-name">{{ $comment->user->name }}</span>
                                        </a>
                                    </li>
                                    <li class="comment-item-content-right-list__item">
                                        {!! $comment->comment !!}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @auth
                            @if (Auth::user()->id == $comment->user_id)
                                <span class="glyphicon glyphicon-option-horizontal comment-item-control"
                                    aria-hidden="true">
                                </span>
                            @endif
                        @endauth
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
