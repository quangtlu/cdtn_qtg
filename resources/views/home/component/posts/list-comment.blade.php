<div class="comment-container">
    <div class="comments wow fadeInUp">
        <h3 class="title-relate" style="margin-top: 50px">Bình luận</h3>
        <div class="comment-wrap comments-grids">
            @foreach ($post->comments->sortByDesc('status')->all() as $comment)
                <div id="post-{{ $post->id }}-comment-{{ $comment->id }}" class="comments-grid" style="margin-top: 25px; margin-bottom:5px">
                    <div class="comments-grid-left">
                        <img src="{{asset('image/profile') .'/'. $comment->user->image }}" alt=" " class="img-responsive" />
                    </div>
                    <div class="comments-grid-right panel">
                        <h4><a
                                href="{{ route('posts.getPostByUser', ['id' => $comment->user->id]) }}">{{ $comment->user->name }}</a>
                        </h4>
                        @if ($comment->user->id == $post->user_id)
                            <h6
                                style="color:#4599ff; background-color:#c5defd; padding: 5px 10px; width:fit-content; border-radius:6px">
                                Tác giả <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h6>
                        @endif
                        <ul>
                            <li><a href="#{{ $comment->id }}">{{ $comment->created_at->diffForHumans() }}</a><i>|</i>
                            </li>
                            <li>
                                @auth
                                    <a class="rep-comment comment-action-link"
                                        data-userName="{{ $comment->user->name }}">Trả
                                        lời <i class="fa fa-mail-reply"></i></a>
                                    @if ($comment->user->id == Auth::user()->id)
                                        |
                                    @endif
                                @endauth
                                @guest
                                    <a class="rep-comment comment-action-link" href="{{ route('login') }}">Trả lời</a>
                                @endguest
                            </li>
                            @auth
                                @if ($comment->status == config('consts.post.status.solved.value') &&
                                    !$post->categories->contains('type', config('consts.category.type.post_reference.value')))
                                    <li> <a href="{{ Auth::user()->id == $post->user_id ? route('comments.toogleStatus', ['id' => $comment->id]) : '#' . $comment->id }}"
                                            class="comment-action-link post-status-solved">Hữu ích nhất
                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                        </a>|</li>
                                @endif
                            @endauth
                            @auth
                                @if ($comment->user->id == Auth::user()->id)
                                    <li><a class="comment-action-link btn-delete-comment"
                                            data-url="{{ route('comments.destroy', ['id' => $comment->id]) }}">Xóa
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>|</li>
                                    </li>
                                    <li><a data-id="{{ $comment->id }}" class="comment-action-link btn-edit-comment">Chỉnh sửa
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a></li>
                                    </li>
                                @endif
                                @if($post->user_id == Auth::user()->id && $post->status == config('consts.post.status.unsolved.value') &&
                                    !$post->categories->contains('type', config('consts.category.type.post_reference.value'))
                                    )
                                    <li><a href="{{ route('comments.toogleStatus', ['id' => $comment->id]) }}"
                                            class="comment-action-link post-status-solved">Hữu ích nhất
                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                        </a></li>
                                    </li>
                                    </li>
                                @endif
                            @endauth
                        </ul>
                        <p class="comment-content">{{ $comment->comment }}</p>
                        @auth
                            @if ($comment->user->id == Auth::user()->id)
                                <div class="leave-coment-form edit-comment-wrap">
                                    <form class="edit-comment-form" action="{{ route('comments.update', ['id' => $comment->id]) }}" method="post">
                                        @csrf
                                        <textarea name="comment" placeholder="Nhập bình luận...">{{ $comment->comment }}</textarea>
                                        @error('comment')
                                            <span class="mt-1 text-danger">{{ $message }}</span>
                                        @enderror
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
        </div>
    </div>
    <div class="leave-coment-form wow fadeInUp">
        @auth
            <form class="form-create-comment" action="{{ route('comments.store') }}" method="post">
                @csrf
                <textarea id="leave-coment" name="comment" placeholder="Nhập bình luận..."></textarea>
                @error('comment')
                    <span class="mt-1 text-danger">{{ $message }}</span>
                @enderror
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="w3_single_submit">
                    <input type="submit" value="Bình luận">
                </div>
            </form>
        @endauth
        @guest
            <a style="margin-bottom: 10px" class="agileits w3layouts" href="{{ route('login') }}">Đăng nhập để bình luận<span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
        @endguest
    </div>
</div>
