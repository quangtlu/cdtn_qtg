@extends('layouts.two-column')
@section('title', 'Diễn đàn')
@section('css')
    <link href="{{ asset('AdminLTE/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
    <style>
        .panel-primary>.panel-heading,
        .header-modal-post {
            background-color: var(--primary-color) !important;
            color: #fff !important;
        }
    </style>
@endsection
@section('content')
    {{-- add/update post --}}
    @auth
        <div class="post-container">
            <div class="post-content">
                <div style="display: flex; align-items:center">
                    <div class="col-md-1 col-xs-2">
                        <img id="avt-user" src="{{ asset('image/profile/' . Auth::user()->image) }}" alt="">
                    </div>
                    <div class="col-md-11 col-xs-10">
                        <span data-toggle="modal" data-target="#add-modal" id="create-post" class="form-control">
                            <b>{{ Auth::user()->name }}</b> ơi, đăng bài lên diễn đàn nào...
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
                        <button type="button" style="color: #fff;" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="post-modalLabel">Đăng bài viết</h4>
                    </div>
                    <div class="modal-body">
                        <form id="add-post-form" action="{{ route('posts.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div id="title" class="form-group">
                                <label class="label-required" for="title">Tiêu đề</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                @error('title')
                                    <span id="error-title" class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
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
                                <label for="category_id">Mục lục</label>
                                <select name="category_id[]" class="form-control select2_init" multiple>
                                    @hasanyrole('admin|editor')
                                        @include('common.option-categories', [
                                            'categories' => $categoryReferences,
                                        ])
                                    @else
                                        @include('common.option-categories', [
                                            'categories' => $categories,
                                        ])
                                    @endhasanyrole
                                </select>
                            </div>
                            @hasanyrole('admin|editor')
                                <div class="reference_id-group">
                                    <label>Tài liệu tham khảo</label>
                                    <select name="reference_id[]" class="form-control select2_init" multiple>
                                        <option></option>
                                        @foreach ($references as $reference)
                                            <option value="{{ $reference->id }}"
                                                {{ collect(old('reference_id'))->contains($reference->id) ? 'selected' : '' }}>
                                                {{ $reference->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endhasanyrole
                            <div class="form-group">
                                <label class="label-required">Nội dung</label>
                                <textarea class="editor" name="content" class="content" cols="30" rows="5">{{ old('content') }}</textarea>
                                @error('content')
                                    <span id="error-content" class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
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
    @include('home.component.posts.list-post', ['posts' => $posts, 'isForum' => true])
@endsection
@section('js')
    <script src="{{ asset('AdminLTE/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        $('[data-toggle="tooltip"]').tooltip();
        // ckeditor
        window.editors = {};
        document.querySelectorAll(".editor").forEach((node, index) => {
            ClassicEditor.create(node, {}).then((newEditor) => {
                window.editors[index] = newEditor;
            });
        });
        // select2
        $(".select2_init").select2();
        $('#search').click(function() {
            $('#toggle').fadeToggle();
        });
        @if ($errors->any())
            var htmlError = `<ul>`
            const messageContent = $('#error-content').text();
            const messageTitle = $('#error-title').text();
            if (messageTitle) {
                htmlError += `<li>${messageTitle}</li>`
            }
            if (messageContent) {
                htmlError += `<li>${messageContent}</li>`
            }
            htmlError += `</ul>`
            Swal.fire({
                icon: 'error',
                title: 'Lỗi nhập dữ liệu',
                html: htmlError,
            })
        @endif
    </script>
@endsection
