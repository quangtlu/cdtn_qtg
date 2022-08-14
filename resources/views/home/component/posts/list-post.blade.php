@if ($posts->count())
    @if (isset($isPostReference))
        @foreach ($posts as $post)
            @include('home.component.posts.single-post', [
                'post' => $post,
                'isPostReference' => $isPostReference,
            ])
        @endforeach
    @elseif (isset($isPostRequest))
        @foreach ($posts as $post)
            @include('home.component.posts.single-post', [
                'post' => $post,
                'isPostRequest' => $isPostRequest,
            ])
        @endforeach
    @else
        @foreach ($posts as $post)
            @include('home.component.posts.single-post', [
                'post' => $post,
            ])
        @endforeach
    @endif
    {{ $posts->withQueryString()->links() }}
@else
    <div class="alert alert-warning alert-no-post" style="margin-top: 10px" role="alert">Không có bài viết nào</div>
@endif
