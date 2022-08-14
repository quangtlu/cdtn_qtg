@extends('layouts.three-columns')
@section('title', 'Quyền sở hữu trí tuệ')
@section('css')
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/post/show.css') }}">
@endsection
@section('content')
@if ($post)
    @include('home.component.posts.single-post', ['post' => $post, 'isHidePostHeader' => true])
@else
    <div class="alert alert-warning alert-no-post" style="margin-top: 10px" role="alert">Không có bài viết nào</div>
@endif
@endsection
