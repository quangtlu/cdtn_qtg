@extends('layouts.three-columns')
@section('title', $post->title ?? 'Quyền sở hữu trí tuệ')
@section('css')
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/post/show.css') }}">
@endsection
@section('content')
    @if ($post)
        @include('home.component.posts.single-post', ['post' => $post, 'isPostReference' => true])
        <div class="navigation-button-wrap">
            {{-- prev --}}
            @if ($refrenceChildCategories->first()->id <= request()->route('id') - 1)
                <a href="{{ route('posts.getPostByCategory', ['id' => request()->route('id') - 1]) }}"
                    class="btn button-active "><i class="fa fa-step-backward"></i> Trước</a>
            @else
                <a disabled="disabled"
                    class="btn button-active "><i class="fa fa-step-backward"></i> Trước</a>
            @endif
            {{-- next --}}
            @if ($refrenceChildCategories->last()->id >= request()->route('id') + 1)
            <a href="{{ route('posts.getPostByCategory', ['id' => request()->route('id') + 1]) }}"
                class="btn button-primary">Tiếp theo <i class="fa fa-step-forward"></i></a>
            @else
                <a disabled="disabled"
                class="btn button-primary">Tiếp theo <i class="fa fa-step-forward"></i></a>
            @endif

        </div>
    @else
        <div class="alert alert-warning alert-no-post" style="margin-top: 10px" role="alert">Không có bài viết nào</div>
    @endif
@endsection
