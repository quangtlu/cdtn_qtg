@if ($posts->count())
    @if (isset($isHidePostHeader))
        @foreach ($posts as $post)
            @include('home.component.posts.single-post', [
                'post' => $post,
                'isHidePostHeader' => $isHidePostHeader,
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
