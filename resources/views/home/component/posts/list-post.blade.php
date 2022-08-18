@if ($posts->count())
    @foreach ($posts as $post)
        @switch(true)
            @case(isset($isPostReference))
                @include('home.component.posts.single-post', [
                    'post' => $post,
                    'isPostReference' => $isPostReference,
                ])
            @break

            @case(isset($isPostRequest))
                @include('home.component.posts.single-post', [
                    'post' => $post,
                    'isPostRequest' => $isPostRequest,
                ])
            @break

            @case(isset($isForum))
                @if (!$post->categories->contains('type', config('consts.category.type.post_reference.value')))
                    @include('home.component.posts.single-post', [
                        'post' => $post,
                        'isForum' => $isForum,
                    ])
                @endif
            @break

            @default
                @include('home.component.posts.single-post', [
                    'post' => $post,
                ])
        @endswitch
    @endforeach
    {{ $posts->withQueryString()->links() }}
@else
    <div class="alert alert-warning alert-no-post" style="margin-top: 10px" role="alert">Không có bài viết nào</div>
@endif
