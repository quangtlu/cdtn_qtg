@extends('layouts.two-column')
@section('title', $post->title)
@section('content')
    @if ($post->categories->contains('type', config('consts.category.type.post_reference.value')))
        @include('home.component.posts.single-post', ['post' => $post, 'isPostReference' => true])
    @else
        @include('home.component.posts.single-post', ['post' => $post])
    @endif
    <div style="margin-top: 30px">
        <h3 class="title-relate">Bài viết liên quan</h3>
        @include('home.component.posts.list-post', ['posts' => $postRelates])
    </div>
@endsection
