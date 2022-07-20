@extends('layouts.home')
@section('title', 'Bài viết')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
    <style>
        .form-filters {
            margin-bottom: 60px;
            margin: 0 0 60px -15px;
        }

        .sort-product {
            margin: 0 0 13px 0px;

        }
    </style>
@endsection
@section('content')
    {{-- add/update post --}}
    @auth
        <div class="panel panel-primary">
            <div class="panel-heading">Đăng bài viết</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-1">
                        <img id="avt-user" src="{{ asset('image/profile/' . Auth::user()->image) }}" alt="">
                    </div>
                    <div class="col-md-11">
                        <span data-toggle="modal" data-target="#add-modal" id="create-post" class="form-control">
                            {{ Auth::user()->name }} ơi, đăng bài lên diễn đàm để cùng thảo luận nào
                        </span>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal add post --}}
        <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="post-modalLabel">Tạo bài viết</h4>
                    </div>
                    <div class="modal-body">
                        <form id="add-post-form" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div id="title" class="form-group">
                                <label for="title">Tiêu đề</label>
                                <input  type="text" name="title" class="form-control"
                                    value="{{ old('title') }}">
                            </div>
                            <div id="tag_id" class="form-group">
                                <label>Thẻ tag</label>
                                <select name="tag_id[]" class="form-control select2_init" multiple>
                                    <option></option>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            {{ collect(old('tag_id'))->contains($tag->id) ? 'selected' : '' }}>
                                            {{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="category_id" class="form-group">
                                <label for="category">Mục lục</label>
                                <select name="category_id[]" class="form-control select2_init" multiple>
                                    <option></option>
                                    @foreach ($categories as $category)
                                        @if ($category->name == config('consts.category_reference.name'))
                                            @role('admin|editor')
                                                <option value="{{ $category->id }}"
                                                    {{ collect(old('category_id'))->contains($category->id) ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endrole
                                        @else
                                            <option value="{{ $category->id }}"
                                                {{ collect(old('category_id'))->contains($category->id) ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="summernote" name="content" class="content" cols="30" rows="5">{{ old('content') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Ảnh</label>
                                <input type="file" multiple class="form-control-file" name="image[]" id="image">
                            </div>
                            <button type="submit" id="submit-btn-add" class="btn-modal-post btn btn-success mb-2">Đăng
                                bài</button>
                            <button type="button" class="btn-modal-post btn btn-danger" data-dismiss="modal">Hủy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    @endauth
    @guest
        <a style="margin-bottom: 10px" class="agileits w3layouts" href="{{ route('login') }}">Đăng nhập để đăng bài viết<span
                class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
    @endguest
    <div class="col my-auto" id="search" style="margin-top: 2px;">
        <a class="card btn btn-default my-auto" data-toggle="collapse" href="#collapseSearch" aria-expanded="false"
            aria-controls="collapseExample">
            <i class="fa fa-search"></i>
            <span>Tìm kiếm bài viết</span>
        </a>
    </div>
    <div class="panel panel-primary search-and-filter" id="toggle" style="margin-top: 10px; display:none; padding: 15px">
        <div>
            <div class="sort-product">
                <form action="{{ route('posts.index') }}" method="GET">
                    <div class="row">
                        <div class="col-md-10">
                            <select name="sort" id="" class="form-control">
                                <option value="sort-new-post">Mới nhất</option>
                                <option value="sort-new-comment">Hoạt động gần đây</option>
                                <option value="sort-old-post">Cũ nhất</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary ">Sắp xếp</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="form-filters">
                <form action="{{ route('posts.index') }}" method="get">
                    <div class="row col-md-12">
                        <div class="col-md-2">
                            <select name="tag_id" class="form-control">
                                <option value="" class="filter-option-dafault">Tag</option>
                                <option value="" class="filter-option-dafault">Tất cả</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        {{ request()->tag_id == $tag->id ? 'selected' : false }}>
                                        {{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="category_id" id="sort" class="form-control">
                                <option value="" class="filter-option-dafault">Mục lục</option>
                                <option value="" class="filter-option-dafault">Tất cả</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ request()->category_id == $category->id ? 'selected' : false }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="status" id="sort" class="form-control">
                                <option value="" class="filter-option-dafault">Trạng thái</option>
                                @foreach (config('consts.post.status') as $status)
                                    @if ((isset($isMyPost) && $isMyPost == true) ||
                                        (Auth::user() && Auth::user()->hasAnyRole('mod|admin') &&
                                        ($status['value'] == config('consts.post.status.request.value') ||
                                        $status['value'] == config('consts.post.status.refuse.value'))))
                                        
                                        <option value="{{ $status['value'] }}">{{ $status['name'] }}</option>
                                    @elseif ($status['value'] != config('consts.post.status.request.value') &&
                                        $status['value'] != config('consts.post.status.refuse.value'))
                                        <option value="{{ $status['value'] }}">{{ $status['name'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="keyword" placeholder="Tìm kiếm bài viết" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary" style="width:100%">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('home.component.posts.list', ['posts' => $posts])

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#search').click(function() {
            $('#toggle').fadeToggle();
        });
        $('#header-search-form').attr('action', '{{ route('posts.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm bài viết theo tiêu đề, nội dung, tác giả...');
        $('.summernote').summernote({
            height: 200
        });
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
       
        function resetForm(formElement, action)
        {
            $('#post-modalLabel').text('Đăng bài viết')
            formElement.trigger("reset");
            formElement.attr('action', action)
            $(".select-tag-add").val([]).change();
            $(".select-category-add").val([]).change();
            $('.summernote-add').summernote('reset')
            $('#submit-btn-add').text('Đăng bài')
        }


        function renderValidateMessage(id, message)
        {
            if(!$('#error-' + id).length) {
                $('#' + id).append(`<span id="error-${id}" class="mt-1 text-danger">${message}</span>`); 
            }
        }

        $('#add-post-form').submit(function (e) { 
            e.preventDefault();
            const that = $(this)
            const unsolvedStatus = {{ config('consts.post.status.unsolved.value') }}
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: new FormData(this),
                contentType:false,
                processData:false,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $('#add-modal').modal('hide')
                    resetForm(that)
                    alertMessage(response.message, 'success')
                    if(response.post.status == unsolvedStatus){
                        let showPostUrl = response.orther.showPost
                        var html = 
                            `
                                <div class="post-ajax-${response.post.id} wthree-top-1 animate__animated animate__fadeInUp">
                                    <div class="w3agile-top">
                                        <div class="col-md-3 w3agile-left">
                                            <ul class="post-info">
                                                <li><a class="post-info__link" href="${response.orther.getPostByUser}"><i
                                                            class="fa  fa-user" aria-hidden="true"></i>${response.orther.userName}</a>
                                                </li>
                                                <li><a class="post-info__link" href="${showPostUrl}">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>${response.orther.time}</a>
                                                </li>
                                                <li><a class="post-info__link" href="${showPostUrl}">
                                                    <i class="fa fa-comment" aria-hidden="true"></i>0
                                                        BÌNH LUẬN
                                                    </a>
                                                </li>`;
                                                if (response.orther.status) {
                                                    html += 
                                                    `<li>
                                                        <a class="${response.orther.status.className}" href="${response.orther.toogleStatus}">
                                                            <i class="fa ${response.orther.status.classIcon}" aria-hidden="true"></i>
                                                            ${response.orther.status.name}
                                                        </a>
                                                    </li>`
                                                }
                                                    
                                            html += `
                                                <li><a class="post-info__link btn-delete"
                                                        data-url="${response.orther.destroyPost}"><i
                                                            class="fa fa-trash" aria-hidden="true"></i> Xóa bài viết</a></li>
                                            </ul>
                                        </div>
                                        <div class="panel panel-primary">
                                            <div class="panel-body">
                                                <div class="col-md-9 w3agile-right post-content-limit-line">
                                                    <h3><a href="${showPostUrl}">${response.post.title}</a></h3>
                                                    <div class="post-content-limit-line">${response.post.content}</div>
                                                    <a class="agileits w3layouts" href="${showPostUrl}">Xem
                                                        thêm<span class="glyphicon agileits w3layouts glyphicon-arrow-right"
                                                            aria-hidden="true"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            `
                        $('.search-and-filter').after(html)
                    }
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
