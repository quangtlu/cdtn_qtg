<div class="w3l_categories">
    <h3>Chuyên mục</h3>
    <div class="w3l_wrap">
        <ul>
            @foreach ($refrenceCategories as $index => $category)
                @if ($index != 0)
                    <li>
                        <a style="font-size: 16px; font-weight:bold"
                            href="{{ route('posts.getPostByCategory', ['id' => $category->id]) }}">
                            {{ $index }}.{{ $category->name }}
                        </a>
                        @if ($category->categories->count())
                            <ul style="padding-left: 15px">
                                @foreach ($category->categories as $indexChild => $categoryChild)
                                    <li>
                                        <a href="{{ route('posts.getPostByCategory', ['id' => $categoryChild->id]) }}">
                                            <b>{{ $index . '.' . ($indexChild + 1)}}</b>. {{$categoryChild->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
<div class="w3ls_popular_posts">
    <h3>Bài viết mới nhất</h3>
    @foreach ($newestPosts as $post)
        <div class="agileits_popular_posts_grid">
            <h4><a class="post-content-limit-line"
                    href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h4>
            <h5><i class="fa fa-clock-o" aria-hidden="true"></i>{{ $post->created_at->diffForHumans() }}</h5>
        </div>
    @endforeach
</div>
<div class="w3l_tags">
    <h3>Tags</h3>
    <div class="w3l_wrap">
        <ul class="tag">
            @foreach ($tags as $tag)
                <li><a href="{{ route('posts.getPostByTag', ['id' => $tag->id]) }}">{{ $tag->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
