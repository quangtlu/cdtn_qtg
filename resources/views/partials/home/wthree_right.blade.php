<div class="col-md-3 w3agile_blog_left">
    <div class="w3l_categories">
        <h3>Chuyên mục</h3>
        <div class="w3l_wrap">
            <ul>
                @foreach ($refrenceCategories as $index => $category)
                    <li>
                        <a style="font-size: 16px; font-weight:bold" href="{{ route('posts.getPostByCategory', ['id' => $category->id]) }}">
                            {{ $index}}.{{$category->name }}
                        </a>
                        @if ($category->categories->count())
                            <ul style="padding-left: 35px">
                                @foreach ($category->categories as $indexChild => $categoryChild)
                                    <li>
                                        <a href="{{ route('posts.getPostByCategory', ['id' => $categoryChild->id]) }}">
                                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                                            {{ $index.'.'.($indexChild+1).'. '.$categoryChild->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="w3ls_popular_posts">
        <h3>Bài viết mới nhất</h3>
        @foreach ($newestPosts as $post)
            <div class="agileits_popular_posts_grid">
                <h4><a class="post-content-limit-line" href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title}}</a></h4>
                <h5><i class="fa fa-clock-o" aria-hidden="true"></i>{{ $post->created_at->diffForHumans() }}</h5>
            </div>
        @endforeach
    </div>
    <div class="w3ls_popular_posts">
        <h3>Tác phẩm mới xuất bản</h3>
        @foreach ($newestProducts as $product)
            <div class="agileits_popular_posts_grid">
                <h4><a class="post-content-limit-line" href="{{ route('products.show', ['id' => $product->id]) }}">{{ $product->name}}</a></h4>
                <h5><i class="fa fa-calendar" aria-hidden="true"></i>{{ $product->pub_date }}</h5>
            </div>
        @endforeach
    </div>
    <div class="w3l_categories">
        <h3>Mục lục tác phẩm</h3>
        <div class="w3l_wrap">
            <ul>
                @foreach ($productCategories as $category)
                    <li>
                        <a href="{{ route('products.getProductByCategory', ['id' => $category->id]) }}">
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                            {{ $category->products->count() ? $category->name.' ('.$category->products->count().')' : $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="w3l_tags">
        <h3>Tags</h3>
        <div class="w3l_wrap">
            <ul class="tag">
                @foreach ($tags as $tag)
                    <li><a href="{{ route('posts.getPostByTag', ['id' => $tag->id]) }}">{{$tag->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<style>
    .w3l_tags{
        margin-top: 4rem;
    }
    .w3l_wrap {
        overflow: scroll;
    }
    .w3l_wrap {
    -ms-overflow-style: none;
    scrollbar-width: none;
    }
    .w3l_wrap::-webkit-scrollbar {
     display: none;
    }
</style>