@extends('layouts.home')
@section('title', 'Trang chủ')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
@endsection
@section('content')
    <h3 style="border-left: 3px solid #ffac3a; padding-left: 10px; text-transform:uppercase">Tài liệu quyền tác giả</h3>
    @include('home.component.posts.list', ['posts' => $posts])
@endsection
@section('js')
    <script defer src="{{ asset('template_blog/js/jquery.flexslider.js') }}"></script>
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
    </script>
@endsection
