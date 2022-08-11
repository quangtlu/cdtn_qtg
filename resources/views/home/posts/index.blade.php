@extends('layouts.two-column')
@section('title', 'Diễn đàn')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/post/show.css') }}">
    <style>
        .panel-primary>.panel-heading, .header-modal-post{
            background-color: var(--primary-color) !important;
            color: #fff !important;
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
                    <div class="modal-header header-modal-post">
                        <button type="button" style="color: #fff;"  class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="post-modalLabel">Đăng bài viết</h4>
                    </div>
                    <div class="modal-body">
                        <form id="add-post-form" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div id="title" class="form-group">
                                <label class="label-required" for="title">Tiêu đề</label>
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
                                    @foreach ($categories as $index => $category)
                                        @hasanyrole('admin|editor')
                                            <option value="{{ $category->id }}">{{$index.'. '.$category->name }}</option>
                                            @if ($category->categories->count())
                                                @foreach ($category->categories as $indexChild => $categoryChild)
                                                    <option value="{{ $categoryChild->id }}">{{$index . '.' . ($indexChild+1) . '. '.$categoryChild->name }}</option>
                                                @endforeach
                                            @endif
                                        @else
                                            @if ($category->type != config('consts.category.type.post_reference.value') && $category->parent_id == 0)
                                                <option value="{{ $category->id }}">{{$index.'. '.$category->name }}</option>
                                                @if ($category->categories->count())
                                                    @foreach ($category->categories as $indexChild => $categoryChild)
                                                        <option value="{{ $categoryChild->id }}">{{$index . '.' . ($indexChild+1) . '. '.$categoryChild->name }}</option>
                                                    @endforeach
                                                @endif
                                            @endif
                                        @endhasanyrole
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="editor" name="content" class="content" cols="30" rows="5">{{ old('content') }}</textarea>
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
    @include('home.component.posts.search-filter', ['categories' => $categories, 'tags' => $tags])
    @include('home.component.posts.list-post', ['posts' => $posts])
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
        $('.select2_init').select2()

        $('#search').click(function() {
            $('#toggle').fadeToggle();
        });
        $('#header-search-form').attr('action', '{{ route('posts.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm bài viết theo tiêu đề, nội dung, tác giả...');
    </script>
@endsection
