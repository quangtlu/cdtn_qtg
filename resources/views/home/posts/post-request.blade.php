@extends('layouts.one-column')
@section('title', 'Yêu cầu phê duyệt')
@section('css')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
@endsection
@section('content')
    @include('home.component.posts.list', ['posts' => $posts, 'isPostRequest' => true])
@endsection
@section('js')
    <script>
        $('#search').click(function() {
            $('#toggle').fadeToggle();
        });
        $('#header-search-form').attr('action', '{{ route('posts.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm bài viết theo tiêu đề, nội dung, tác giả...');
    </script>
    @include('home.component.commentjs')
@endsection
