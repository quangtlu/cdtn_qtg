<div class="col-md-2 w3agile_blog_left wow fadeInRight">
    <div class="agileinfo_calender">
        <h3>Mạng xã hội</h3>
        <div class="w3ls-social-icons-1">
            <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
            <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
            <a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a>
            <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
            <a class="linkedin" href="#"><i class="fa fa-google-plus"></i></a>
            <a class="linkedin" href="#"><i class="fa fa-rss"></i></a>
            <a class="linkedin" href="#"><i class="fa fa-behance"></i></a>
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

    <div class="w3l_categories wow fadeInUp">
        <h3>Danh mục</h3>
        <div class="w3l_wrap">
            <ul>
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('posts.getPostByCategory', ['id' => $category->id]) }}">
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                            {{ $category->posts->count() ? $category->name.' ('.$category->posts->count().')' : $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="w3l_tags wow fadeInUp">
        <h3>Tags</h3>
        <div class="w3l_wrap">
            <ul class="tag">
                @foreach ($tags as $tag)
                    <li><a href="{{ route('posts.getPostByTag', ['id' => $tag->id]) }}">{{ $tag->posts->count() ? $tag->name.' ('.$tag->posts->count().')' : $tag->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<style>
    .w3l_tags{
        margin-top: 4rem;
    }
    .w3l_wrap ul {
        max-height: 500px;
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