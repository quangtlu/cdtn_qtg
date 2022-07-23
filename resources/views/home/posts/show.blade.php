@extends('layouts.home')
@section('title', $post->title)
@section('css')
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('home/post/show.css') }}">
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
@endsection
@section('content')
    <div id="post-info-wrap" class="single-left1 panel" style="padding: 10px !important">
        <h3 id="post-title" class="title-relate">{{ $post->title }}</h3>
        <ul class="post-info-list">
            <li class="user-post-info-wrap">
                <img class="user-post-avt" src="{{ asset('image/profile') .'/' . $post->user->image }}" alt="">
                <a class="post-info__link" href="{{ route('posts.getPostByUser', ['id' => $post->user_id]) }}">{{ $post->user->name }}</a>
            </li>
            <li><span class="glyphicon glyphicon-tag" aria-hidden="true"></span><a
                    href="#tag" id="number-tag">{{ $post->tags->count() }}
                    Tag</a>
            </li>
            <li><span class="fa fa-comment" aria-hidden="true"></span><a id="number-comment"
                    href="#{{ $post->comments->count() > 0 ? $post->comments->first()->id : 'comments' }}">{{ $post->comments->count() }}
                    bình
                    luận</a></li>
            <li><span class="fa fa-list-alt" aria-hidden="true"></span><a id="number-category"
                    href="#category">{{ $post->categories->count() }} Mục lục</a></li>
            <li><span class="fa fa-clock-o" aria-hidden="true"></span><a
                    href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->created_at->diffForHumans() }}</a>
            </li>
        </ul>
        <div id="post-content" style="padding-top: 10px">{!! $post->content !!}</div>
    </div>
    @if ($post->image)
        <div id="post-image-wrap" class="w3agile-top wow fadeInUp">
            <section class="slider">
                <div class="flexslider">
                    <ul id="slide-image" class="slides">
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
        <ul id="category-list" class="tag">
            <span style="font-size:18px">Mục lục: </span>
            @foreach ($post->categories as $category)
                <li class="li-category-tag">
                    <a href="{{ route('posts.getPostByCategory', ['id' => $category->id]) }}">{{ $category->name }}</a>
                </li>   
            @endforeach
        </ul>
        <ul id="tag-list" class="tag" style="margin-top:0 !important; margin-bottom:0 !important">
            <span style="margin-top:10px; font-size:18px">Tags: </span>
            @foreach ($post->tags as $tag)
                <li class="li-category-tag">
                    <a href="{{ route('posts.getPostByTag', ['id' => $tag->id]) }}">{{ $tag->name }}</a>
                </li>
            @endforeach
        </ul>
        @if (!$post->categories->contains('type', config('consts.category.type.post_reference.value')))
            <div class="post-status-wrap">
                <span style="margin-top:10px; font-size:18px">Trạng thái : </span>
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
            </div>
        @endif
    </div>
    @auth
        @if (Auth::user()->id == $post->user_id)
            @if ($post->chatroom)
                <a class="btn btn-success" style="margin-top: 10px"
                    href="{{ route('messenger.show', ['id' => $post->chatroom->id]) }}">Trò chuyện với chuyên gia tư vấn <i
                        class="fa fa-comments"></i></a>
            @endif
            <button style="margin-top:10px" id="edit-post" class="btn btn-primary" data-toggle="modal"
                data-target="#edit-modal">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                Sửa bài viết
            </button>
            {{-- modal edit post --}}
            <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="post-modalLabel">Sửa bài viết</h4>
                        </div>
                        <div class="modal-body">
                            <form id="edit-post-form" action="{{ route('posts.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div id="title" class="form-group">
                                    <label for="title">Tiêu đề</label>
                                    <input  type="text" name="title" class="form-control"
                                        value="{{ old('title') ? old('title') : $post->title}}">
                                    @error('title')
                                        <span class="mt-1 text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div id="tag_id" class="form-group">
                                    <label>Thẻ tag</label>
                                    <select name="tag_id[]" class="form-control select2_init" multiple>
                                        @foreach ($tags as $tag)
                                            <option {{ $post->tags->contains($tag) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div  id="category_id" class="form-group">
                                    <label for="category">Mục lục</label>
                                    <select name="category_id[]" class="form-control select2_init" multiple>
                                        @foreach ($categories as $category)
                                            @if ($category->type == config('consts.category.type.post_reference.value'))
                                                @role('admin|editor')
                                                    <option {{ $post->categories->contains($category) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endrole
                                            @else
                                                <option {{ $post->categories->contains($category) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea id="editor" value="{{ old('content') ?? $post->content }}" name="content" cols="30" rows="5">{{ $post->content }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Ảnh</label>
                                    <input type="file" multiple class="form-control-file" name="image[]" id="image">
                                </div>
                                <button type="submit" id="submit-btn-edit" class="btn-modal-post btn btn-success mb-2">Cập nhật</button>
                                <button type="button" class="btn-modal-post btn btn-danger" data-dismiss="modal">Hủy</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>            
        @endif
        @role('mod|admin')
            @if ($post->user_id != Auth::user()->id)
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
                                        <button type="button" class="btn-modal-post btn btn-danger" data-dismiss="modal">Đóng</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        @endrole
    @endauth
    {{-- Comment --}}
    <div id="comments" class="comments wow fadeInUp">
        <h3 class="title-relate" style="margin-top: 50px">Bình luận</h3>
        <div id="comment-wrap" class="comments-grids">
            @foreach ($post->comments->sortByDesc('status')->all() as $comment)
                <div id="{{ $comment->id }}" class="comments-grid" style="margin-top: 25px; margin-bottom:5px">
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
                            @if ($comment->status == config('consts.post.status.solved.value') && 
                                !$post->categories->contains('type', config('consts.category.type.post_reference.value')))
                                <li>| <a href="{{ Auth::user()->id == $post->user_id ? route('comments.toogleStatus', ['id' => $comment->id]) : '#' . $comment->id }}"
                                        class="comment-action-link post-status-solved">Hữu ích nhất
                                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                                    </a></li>
                            @endif
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
            <form id="form-create-comment" action="{{ route('comments.store') }}" method="post">
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
    <div class="wow fadeInUp" style="margin-top: 30px">
        <h3 class="title-relate">Bài viết liên quan</h3>
        @include('home.component.posts.list', ['posts' => $postRelates])
    </div>
@endsection
@section('js')
    <script src="{{ asset('template_blog/js/jquery.flexslider.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="module" src="{{ asset('js/alert.js') }}"></script>
    <script type="text/javascript">
    $('#header-search-form').attr('action', '{{ route('posts.index') }}');
    $('#search-input').attr('placeholder', 'Tìm kiếm bài viết theo tiêu đề, nội dung, tác giả...');
    // init libary
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });
        ClassicEditor
            .create(document.querySelector('#editor'))
        $('.select2_init').select2()

        function alertMessage(message, type, time)
        {
            Swal.fire({
                toast: true,
                icon: type == 'success' ? 'success' : 'error',
                title: message,
                position: 'top',
                timer: 2000,
                showConfirmButton: false,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                background: type == 'success' ? '#21ba45' : '#fff',
                color: type == 'success' ? '#fff' : '#000',
            });
        }

        function renderValidateMessage(id, message)
        {
            if(!$('#error-' + id).length) {
                $('#' + id).append(`<span id="error-${id}" class="mt-1 text-danger">${message}</span>`); 
            }
        }

    // function 
        function repComment() {
            let userName = $(this).attr('data-userName')
            $('#leave-coment').text(userName)
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#leave-coment").offset().top
            }, 1000);
        }
        function toogleEditCommentWrap() {
            $(this).closest('.comments-grid-right').children('.edit-comment-wrap').fadeToggle()
        }
        function updateComment(e) {
            e.preventDefault();
            const action = $(this).attr('action')
            const that = $(this)
            $.ajax({
                type: "POST",
                url: action,
                data: $(this).serialize(),
                dataType: "json",
                success: function (response) {
                    const newComment = response.comment.comment
                    const message = response.message
                    that.closest('.comments-grid-right').children('.comment-content').text(newComment)
                    that.closest('.edit-comment-wrap').fadeOut()
                    alertMessage(message, 'success')
                },
                error: function(errors) {
                    let message = errors.responseJSON.errors.comment
                    alertMessage(message, 'error')
                }
            });
        }

        $('.rep-comment').on('click', repComment)

        // call update comment
        $('.btn-edit-comment').on('click', toogleEditCommentWrap)
        $('.edit-comment-form').submit(updateComment);

        // call create comment 
        $('#form-create-comment').submit(function (e) { 
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('comments.store') }}",
                data: $(this).serialize(),
                dataType: "json",
                success: function (res) {
                    const comment = res.comment
                    const orther = res.ortherData
                    const userAuthId = @auth {{ Auth::user()->id }} @endauth

                    $('#form-create-comment').trigger("reset");

                    var html = `
                        <div id="${comment.id}" class="comments-grid animate__animated animate__fadeInUp" style="margin-top: 25px; margin-bottom:5px">
                            <div class="comments-grid-left">
                                <img src="${orther.userImage}" alt=" " class="img-responsive" />
                            </div>
                            <div class="comments-grid-right panel">
                                <h4><a
                                        href="${orther.GetPostByUser}">${comment.user.name}</a>
                                </h4>`

                                if (comment.user_id == comment.post.user_id) {
                                    html += ` <h6 style="color:#4599ff; background-color:#c5defd; padding: 5px 10px; width:fit-content; border-radius:6px">
                                        Tác giả <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h6>`
                                }

                                html += `
                                <ul>
                                    <li><a href="#${comment.id}">${orther.time}</a><i>|</i>
                                    </li>
                                    <li>
                                        <a class="rep-comment comment-action-link"
                                            data-userName="${comment.user.name}">Trả
                                            lời <i class="fa fa-mail-reply"></i></a>
                                            |
                                    </li>
                                    <li><a class="comment-action-link btn-delete-comment"
                                            data-url="${orther.destroyComment}">Xóa
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>|</li>
                                    </li>
                                    <li><a class="comment-action-link btn-edit-comment btn-edit-comment-ajax">Chỉnh sửa
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a></li>
                                    </li>
                                </ul>
                                <p class="comment-content">${comment.comment}</p>
                                    <div class="leave-coment-form edit-comment-wrap">
                                        <form class="edit-comment-form" action="${orther.updateComment}" method="post">
                                            @csrf
                                            <textarea name="comment" placeholder="Nhập bình luận...">${comment.comment}</textarea>
                                            @error('comment')
                                                <span class="mt-1 text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="hidden" name="post_id" value="${comment.post.id}">
                                            <div class="w3_single_submit">
                                                <input type="submit" value="Cập nhật">
                                            </div>
                                        </form>
                                    </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>`

                    
                    $('#comment-wrap').append(html)
                    let totalCommentBefore = Number($('#number-comment').text().replace(/\D/g, "")) 
                    $('#number-comment').text(totalCommentBefore + 1 + ' bình luận')
                    $('.btn-edit-comment-ajax').on('click', toogleEditCommentWrap)
                    $('.edit-comment-form').submit(updateComment)
                    $('.rep-comment').on('click', repComment)
                },
                error: function(errors) {
                    let message = errors.responseJSON.errors.comment
                    alertMessage(message, 'error')
                }
            });
        });

        $('#edit-post-form').submit(function (e) { 
            e.preventDefault();
            const referenceType = {{ config('consts.category.type.post_reference.value') }}
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: new FormData(this),
                contentType:false,
                processData:false,
                dataType: "json",
                success: function (response) {
                    $('#edit-modal').modal('hide')
                    alertMessage(response.message, 'success')
                    post =  response.post
                    $('#post-title').text(post.title)
                    $('#post-content').html(post.content)
                    $('#number-tag').text(post.tags.length + ' Tag')
                    $('#number-category').text(post.categories.length + ' Mục lục')

                    var htmlTag = `<span style="margin-top:10px; font-size:18px">Tags: </span>`
                    var htmlCategory = `<span style="margin-top:10px; font-size:18px">Mục lục: </span>`
                    if(post.tags.length) {
                        post.tags.forEach(tag => {
                            htmlTag += `<li class="li-category-tag"><a href="/posts/tag/${tag.id}">${tag.name}</a></li>`
                        });
                    }
                    if(post.categories.length) {
                        post.categories.forEach(category => {
                            category.type == referenceType ? $('.post-status-wrap').hide() : $('.post-status-wrap').show()
                            htmlCategory += `<li class="li-category-tag"><a href="/posts/category/${category.id}">${category.name}</a></li>`
                        });
                    }
                    $('#tag-list').html(htmlTag)
                    $('#category-list').html(htmlCategory)

                },
                error: function (errors) {
                    let messageError = errors.responseJSON.errors
                    for (let obj in messageError) {
                        if(obj) {
                            renderValidateMessage(obj, messageError[obj][0])
                        }
                    }
                }
            });
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
