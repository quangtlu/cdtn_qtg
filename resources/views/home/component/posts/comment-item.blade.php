<li class="comment-item">
    <div class="row comment-item-content">
        <a class="col-md-1 col-xs-3 comment-item-content-left"
            href="{{ route('posts.getPostByUser', ['id' => $comment->user_id]) }}">
            <img src="{{ asset('image/profile') . '/' . $comment->user->image }}" alt="" class="user-post-avt">
        </a>
        <div class="col-md-11 col-xs-9 comment-item-content-right">
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
                    @if ($comment->status == config('consts.post.status.solved.value'))
                        <a data-toggle="tooltip" data-placement="top" title="{{ $comment->status_name }}"
                            class="{{ $comment->status_class }}" href="">
                            <i class="fa {{ $comment->status_icon_class }}"></i>
                        </a>
                    @endif
                </li>
                <li class="comment-item-content-right-list__item comment-item-body limit-line">
                    {{ $comment->comment }}
                </li>
                @if (strlen($comment->comment) > 934)
                    <a href="#" class="read-more-btn-comment">Xem thêm</a>
                @endif
                <a data-toggle="tooltip" data-placement="top" title="{{ $comment->created_at }}"
                    style="color: rgb(131, 125, 125); font-size: 12px" class="comment-item-content-right-list__item">
                    {{ $comment->created_at->diffForHumans() }}
                </a>
            </ul>
        </div>
    </div>
    @auth
        @if (Auth::user()->id == $comment->user_id)
            <div class="dropdown">
                <span title="Chỉnh sửa hoặc xóa bình luận này"
                    class="dropdown-toggle glyphicon glyphicon-option-horizontal comment-item-control"
                    id="dropdownMenu-{{ $comment->id }}" data-toggle="dropdown" aria-hidden="true" aria-haspopup="true"
                    aria-expanded="true">
                </span>
                <ul class="dropdown-menu dropdown-menu-action-comment" aria-labelledby="dropdownMenu-{{ $comment->id }}">
                    <li class="btn-edit-comment"><a>Chỉnh sửa</a></li>
                    <li><a class="btn-delete-comment"
                            data-url="{{ route('comments.destroy', ['id' => $comment->id]) }}">Xóa</a>
                    </li>
                </ul>
            </div>
        @elseif (Auth::user()->id == $comment->post->user_id)
            <div class="dropdown">
                <span title="Đánh giá hoặc xóa bình luận này"
                    class="dropdown-toggle glyphicon glyphicon-option-horizontal comment-item-control"
                    id="dropdownMenu-{{ $comment->id }}" data-toggle="dropdown" aria-hidden="true" aria-haspopup="true"
                    aria-expanded="true">
                </span>
                <ul class="dropdown-menu dropdown-menu-action-comment" aria-labelledby="dropdownMenu-{{ $comment->id }}">
                    <li><a href="{{ route('comments.toogleStatus', ['id' => $comment->id]) }}"
                            class="btn-edit-comment">Bình luận hữu ích</a></li>
                    <li><a class="btn-delete-comment"
                            data-url="{{ route('comments.destroy', ['id' => $comment->id]) }}">Xóa</a>
                    </li>
                </ul>
            </div>
        @else
            <div class="dropdown">
                <span
                    style="margin-left: 20px;
                padding: 10px;
                border-radius: 50%;
                cursor: pointer;
                opacity:0"
                    class="dropdown-toggle glyphicon glyphicon-option-horizontal">
                </span>
            </div>
        @endif
    @endauth
</li>
{{-- form edit comment --}}
@auth
    @if (Auth::user()->id == $comment->user_id)
        <div class="comment-input-wrap-edit">
            <div class="col-md-1 col-xs-2 comment-input-left">
                <img src="{{ asset('image/profile') . '/' . Auth::user()->image }}" alt="" class="user-post-avt">
            </div>
            <div class="col-md-11 col-xs-10 comment-input-right">
                <form class="create-comment-form" action="{{ route('comments.update', ['id' => $comment->id]) }}"
                    method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <textarea data-submittype="update" name="comment" placeholder="Viết bình luận..." class="input-comment autofit">{{ $comment->comment }}</textarea>
                </form>
                <a class="cancle-edit-comment-btn">Hủy</a>
            </div>
        </div>
    @endif
@endauth
