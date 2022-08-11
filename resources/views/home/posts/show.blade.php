@extends('layouts.two-column')
@section('title', $post->title)
@section('css')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('home/post/show.css') }}">
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
@endsection
@section('content')
    @include('home.component.posts.single-post', ['post' => $post])
    <div class="wow fadeInUp" style="margin-top: 30px">
        <h3 class="title-relate">Bài viết liên quan</h3>
        @include('home.component.posts.list-post', ['posts' => $postRelates])
    </div>
@endsection
@section('js')
    <script src="{{ asset('template_blog/js/jquery.flexslider.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="module" src="{{ asset('js/alert.js') }}"></script>
    <script type="text/javascript">
        $('#search-input').attr('placeholder', 'Tìm kiếm bài viết theo tiêu đề, nội dung, tác giả...');
        ClassicEditor
            .create(document.querySelector('#editor'))
        $('.select2_init').select2()
    </script>
@endsection
