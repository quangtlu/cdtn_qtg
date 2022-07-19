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
        @include('home.component.posts.modal-add', ['categories' => $categories, 'tags' => $tags])
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
        $('.summernote-add').summernote({
            height: 200
        });
        $('.summernote-edit').summernote({
            height: 200
        });
        $('.select-tag-add').select2()
        $('.select-category-add').select2()
        $('.select-tag-edit').select2()
        $('.select-category-edit').select2()

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

        function changeFormToEdit(title, content, categoryIds, tagIds, action) {
            $('#add-modal').modal()
            $('#add-post-form').attr('action', action)
            $('#post-modalLabel').text('Sửa bài viết')
            $('#add-modal').find('input[name="title"]').val(title)
            $('.select-tag-add').val(tagIds)
            $('.select-category-add').val(categoryIds)
            $('.select-tag-add').trigger('change')
            $('.select-category-add').trigger('change')
            $('#submit-btn-add').text('Cập nhật')
            $(".summernote-add").summernote("code", content);
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
                                                <li>
                                                    <a style="color: #0c84ff; cursor: pointer;" class="post-info__link btn-edit-ajax">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                                                        Sửa bài viết
                                                    </a>
                                                </li>
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
                        $('.btn-edit-ajax').click(function (e) {
                            tagIds = response.post.tags.map((tag) => tag.id)
                            categoryIds = response.post.categories.map((category) => category.id)
                            changeFormToEdit(response.post.title, response.post.content, categoryIds, tagIds, response.orther.updatePost)
                            $('#create-post').click(function (e) { 
                                resetForm(that, that.attr('action'))
                            });
                        });

                        if(response.orther.isUpdate) {
                            $('.post-ajax-' + response.post.id).remove()
                            $('.search-and-filter').after(html)
                        }
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
