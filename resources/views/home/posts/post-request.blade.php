@extends('layouts.one-column')
@section('title', 'Yêu cầu phê duyệt')
@section('css')
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
@endsection
@section('content')
    @include('home.component.posts.list-post', ['posts' => $posts, 'isPostRequest' => true])
@endsection
