@extends('layouts.one-column')
@section('title', 'Bài viết của tôi')
@section('css')
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
@endsection
@section('content')
    @include('home.component.posts.list-post', ['posts' => $posts])
@endsection
@section('js')
    <script>
        $('#search').click(function() {
            $('#toggle').fadeToggle();
        });
        $('#header-search-form').attr('action', '{{ route('posts.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm bài viết theo tiêu đề, nội dung, tác giả...');
    </script>
@endsection
