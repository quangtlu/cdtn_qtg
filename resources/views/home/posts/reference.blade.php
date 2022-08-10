@extends('layouts.three-column')
@section('title', 'Quyền sở hữu trí tuệ')
@section('css')
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/post/show.css') }}">
@endsection
@section('content')
    @include('home.component.posts.list', ['posts' => $posts])
@endsection
@section('css')
    <style>
        .w3l_tags {
            margin-top: 4rem;
        }

        .w3l_wrap {
            overflow: scroll;
        }

        .w3l_wrap {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .w3l_wrap::-webkit-scrollbar {
            display: none;
        }
    </style>
@endsection
@section('js')
    <script>
        $('#search').click(function() {
            $('#toggle').fadeToggle();
        });
        $('#header-search-form').attr('action', '{{ route('posts.references') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm bài viết theo tiêu đề, nội dung, tác giả...');
    </script>
    @include('home.component.commentjs')
@endsection
