@if ($posts->count())
    @foreach ($posts as $index => $post)
        <div class="wthree-top-1 {{ $index != 0 ? 'wow fadeInUp' : '' }}">
            <div class="w3agile-top">
                <div class="col-md-3 w3agile-left">
                    <ul class="post-info">
                        <li class="user-post-info-wrap">
                            <img class="user-post-avt" src="{{ asset('image/profile') . '/' . $post->user->image }}"
                                alt="">
                            <a class="post-info__link"
                                href="{{ route('posts.getPostByUser', ['id' => $post->user_id]) }}">{{ $post->user->name }}</a>
                        </li>
                        <li><a class="post-info__link" href="{{ route('posts.show', ['id' => $post->id]) }}">
                                <i class="fa fa-clock-o"
                                    aria-hidden="true"></i>{{ $post->created_at->diffForHumans() }}</a>
                        </li>
                        <li><a class="post-info__link" href="{{ route('posts.show', ['id' => $post->id]) }}">
                                <i class="fa fa-comment" aria-hidden="true"></i>{{ $post->comments->count() }}
                                BÌNH LUẬN
                            </a>
                        </li>
                        @if (!$post->categories->contains('type', config('consts.category.type.post_reference.value')))
                            <li>
                                @foreach (config('consts.post.status') as $item)
                                    @if ($post->status == $item['value'])
                                        <a class="{{ $item['className'] }}"
                                            href="
                                        {{ Auth::user() &&
                                        Auth::user()->id == $post->user_id &&
                                        ($post->status == config('consts.post.status.unsolved.value') ||
                                            $post->status == config('consts.post.status.solved.value'))
                                            ? route('posts.toogleStatus', ['id' => $post->id])
                                            : route('posts.show', ['id' => $post->id]) }}">
                                            <i class="fa {{ $item['classIcon'] }}" aria-hidden="true"></i>
                                            {{ $item['name'] }}</a>
                                        </a>
                                    @endif
                                @endforeach
                            </li>
                        @endif
                        @auth
                            @if (Auth::user()->id == $post->user->id)
                                <li><a class="post-info__link btn-delete"
                                        data-url="{{ route('posts.destroy', ['id' => $post->id]) }}"><i class="fa fa-trash"
                                            aria-hidden="true"></i> Xóa bài viết</a></li>
                            @endif
                        @endauth
                    </ul>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="col-md-9 w3agile-right post-content-limit-line">
                            <h3><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
                            </h3>
                            <div class="post-content-limit-line">{!! $post->content !!}</div>
                            @if (isset($isPostRequest) && $isPostRequest)
                                <form class="hanle-request-form"
                                    action="{{ route('posts.handleRequest', ['id' => $post->id]) }}" method="post">
                                    @csrf
                                    <div style="display: flex; float: left; padding-top:10px">
                                        <button data-screen='post-request' data-action="{{ config('consts.post.action.refuse') }}"
                                            class="btn btn-danger action-btn">
                                            {{ config('consts.post.action.refuse') }}
                                        </button>
                                        <button data-screen='post-request' data-action="{{ config('consts.post.action.accept') }}"
                                            class="action-btn btn btn-success" style="margin-left: 5px">
                                            {{ config('consts.post.action.accept') }}
                                        </button>
                                        <a href="{{ route('posts.show', ['id' => $post->id]) }}"><button type="button"
                                                style="margin-left: 5px" class=" btn btn-info">Xem
                                                thêm</button></a>
                                    </div>
                                </form>
                            @else
                                <a class="agileits w3layouts" href="{{ route('posts.show', ['id' => $post->id]) }}">Xem
                                    thêm<span class="glyphicon agileits w3layouts glyphicon-arrow-right"
                                        aria-hidden="true"></span></a>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    @endforeach
    {{ $posts->withQueryString()->links() }}
@else
    <div class="alert alert-info alert-no-post" style="margin-top: 10px" role="alert">Bài viết đang được cập nhật...</div>
@endif