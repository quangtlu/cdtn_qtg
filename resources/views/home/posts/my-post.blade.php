@extends('layouts.one-column')
@section('title', 'Bài viết của tôi')
@section('css')
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
@endsection
@section('content')
    @include('home.component.posts.list-post', ['posts' => $posts])
@endsection
