@extends('layouts.two-column')
@section('title', $post->title)
@section('content')
    @include('home.component.posts.single-post', ['post' => $post])
    <div class="wow fadeInUp" style="margin-top: 30px">
        <h3 class="title-relate">Bài viết liên quan</h3>
        @include('home.component.posts.list-post', ['posts' => $postRelates])
    </div>
@endsection

