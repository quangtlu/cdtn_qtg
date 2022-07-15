@if ($posts->count())
@foreach ($posts as $index => $post)
    <div class="wthree-top-1 {{ $index != 0 ? 'wow fadeInUp' : '' }}">
        <div class="w3agile-top">
            <div class="col-md-3 w3agile-left">
                <ul class="post-info">
                    <li><a class="post-info__link" href="{{ route('posts.show', ['id' => $post->id]) }}"><i
                                class="fa  fa-user" aria-hidden="true"></i>{{ $post->user->name }}</a>
                    </li>
                    <li><a class="post-info__link" href="{{ route('posts.show', ['id' => $post->id]) }}"><i
                                class="fa fa-calendar"
                                aria-hidden="true"></i>{{ $post->created_at->diffForHumans() }}</a>
                    </li>
                    <li><a class="post-info__link" href="{{ route('posts.show', ['id' => $post->id]) }}">
                        <i class="fa fa-comment" aria-hidden="true"></i>{{ $post->comments->count() }}
                            BÌNH LUẬN
                        </a>
                    </li>
                    <li>
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
                    </li>
                    @auth
                        @if (Auth::user()->id == $post->user->id)
                            <li><a class="post-info__link btn-delete"
                                    data-url="{{ route('posts.destroy', ['id' => $post->id]) }}"><i
                                        class="fa fa-trash" aria-hidden="true"></i> Xóa bài viết</a></li>
                            <li><a id="edit-post" class="post-info__link btn-edit" data-toggle="modal"
                                    data-target="#post-modal" data-title="{{ $post->title }}"
                                    data-content="{{ $post->content }}" data-id="{{ $post->id }}}"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa bài viết</a></li>
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
                        <a class="agileits w3layouts" href="{{ route('posts.show', ['id' => $post->id]) }}">Xem
                            thêm<span class="glyphicon agileits w3layouts glyphicon-arrow-right"
                                aria-hidden="true"></span></a>
                    </div>
                </div>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endforeach
{{ $posts->withQueryString()->links() }}
@endif