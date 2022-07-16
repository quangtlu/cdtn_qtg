@extends('layouts.home')
@section('title', 'Trang chủ')
@section('css')
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
@endsection
@section('content')
        <h3>Tài liệu quyền tác giả</h3>
        @include('home.component.posts.list', ['posts' => $posts])
        {{ $posts->withQueryString()->links() }}
@endsection
@section('js')
    <script>
        $('#header-search-form').attr('action', '{{ route('home.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm bài viết...');
    </script>
@endsection
