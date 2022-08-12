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
                                id="dropdownMenu-{{ $post->id }}" data-toggle="dropdown" aria-hidden="true"
                                aria-haspopup="true" aria-expanded="true">
                            </span>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu-{{ $post->id }}">
                                <li><a href="{{ route('posts.show', ['id' => $post->id]) }}">Chi tiết</a></li>
                                <li><a href="#" data-toggle="modal"
                                        data-target="#edit-modal-{{ $post->id }}">Chỉnh sửa</a></li>
                                @if ($post->status == config('consts.post.status.unsolved.value'))
                                    <li>
                                        <a href="{{ route('posts.toogleStatus', ['id' => $post->id]) }}">
                                            Đã được giải đáp
                                        </a>
                                    </li>
                                @endif
                                @if ($post->status == config('consts.post.status.solved.value'))
                                    <li>
                                        <a href="{{ route('posts.toogleStatus', ['id' => $post->id]) }}">
                                            Chưa được giải đáp
                                        </a>
                                    </li>
                                @endif
                                <li role="separator" class="divider"></li>
                                <li><a class="btn-delete" data-url="{{ route('posts.destroy', ['id' => $post->id]) }}">Xóa
                                        bài viết</a></li>
                            </ul>
                        </div>
                    @endif
                @endauth
            </div>
        @endif
        <div class="post-content ">
            <span class="post-content-title">{{ $post->title }}<a data-toggle="tooltip" data-placement="top"
                    title="{{ $post->status_name }}" class="{{ $post->status_class }}" href="">
                    <i class="fa {{ $post->status_icon_class }}"></i>
                </a></span>
            <div class="post-content-body limit-line">
                {!! $post->content !!}
            </div>
            @if (strlen($post->content) > 811)
                <a href="#" class="read-more-btn">Xem thêm</a>
            @endif
            @if ($post->tags->count())
                <div class="post-tags">
                    @foreach ($post->tags as $tag)
                        <a href="{{ route('posts.getPostByTag', ['id' => $tag->id]) }}"
                            class="post-tag-item">#{{ $tag->name }}</a>
                    @endforeach
                </div>
            @endif
            @if ($post->categories->count())
                <div class="post-tags">
                    @foreach ($post->categories as $category)
                        <a href="{{ route('posts.getPostByCategory', ['id' => $category->id]) }}"
                            class="active">#{{ $category->name }}</a>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="post-image">
            @if ($post->image)
                <div id="carousel-example-generic-{{ $post->id }}" class="carousel slide" data-ride="carousel">
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
                    <form class="create-comment-form" action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <textarea name="comment" placeholder="Viết bình luận..." class="input-comment autofit"></textarea>
                    </form>
                </div>
            </div>
        @endauth
        @guest
            <a class="button-primary" href="{{ route('login') }}">Đăng nhập để bình luận</a>
        @endguest
        @if ($post->comments->count())
            <ul class="list-comment">
                @foreach ($post->comments->sortByDesc('status')->all() as $comment)
                    <li class="comment-item">
                        <div class="comment-item-content">
                            <a class="comment-item-content-left"
                                href="{{ route('posts.getPostByUser', ['id' => $comment->user_id]) }}">
                                <img src="{{ asset('image/profile') . '/' . $comment->user->image }}" alt=""
                                    class="user-post-avt">
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
{{-- Modal edit post --}}
<div class="modal fade" id="edit-modal-{{ $post->id }}" tabindex="-1" role="dialog"
    aria-labelledby="post-modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Chỉnh sửa bài viết</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div id="title" class="form-group">
                        <label class="label-required" for="title">Tiêu đề</label>
                        <input type="text" name="title" class="form-control"
                            value="{{ old('title') ? old('title') : $post->title }}">
                        @error('title')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div id="tag_id" class="form-group">
                        <label>Thẻ tag</label>
                        <select name="tag_id[]" class="form-control select2_init" multiple>
                            @foreach ($tags as $tag)
                                <option {{ $post->tags->contains($tag) ? 'selected' : '' }}
                                    value="{{ $tag->id }}">
                                    {{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="category_id" class="form-group">
                        <label for="category">Mục lục</label>
                        <select name="category_id[]" class="form-control select2_init" multiple>
                            @foreach ($categories as $category)
                                @if ($category->type == config('consts.category.type.post_reference.value'))
                                    @role('admin|editor')
                                        <option {{ $post->categories->contains($category) ? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endrole
                                @else
                                    <option {{ $post->categories->contains($category) ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label-required">Nội dung</label>
                        <textarea id="editor-{{ $post->id }}" class="editor" value="{{ old('content') ?? $post->content }}"
                            name="content" cols="30" rows="5">{{ $post->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh</label>
                        <input type="file" multiple class="form-control-file" name="image[]">
                    </div>
                    <button type="submit" class="btn-modal-post btn btn-success mb-2">Cập
                        nhật</button>
                    <button type="button" class="btn-modal-post btn btn-danger" data-dismiss="modal">Hủy</button>
                </form>
            </div>
        </div>
    </div>
</div>
