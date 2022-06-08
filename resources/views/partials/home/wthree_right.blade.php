<div class="col-md-3 w3agile_blog_left">
    <div class="wthreesearch">
        <form action="{{ route('posts.search') }}" method="GET">
            <input type="search" name="keyword" placeholder="Tìm kiếm" required="">
            <button type="submit" class="btn btn-default search" aria-label="Left Align">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>

    </div>

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
                <div class="w3agile_special_deals_grid_left_grid">
                    <a href="singlepage.html"><img src="images/p1.jpg" class="img-responsive" alt="" /></a>
                </div>
                <h4><a href="singlepage.html">{{ $post->title }}</a></h4>
                <h5><i class="fa fa-calendar" aria-hidden="true"></i>{{ $post->created_at }}</h5>
            </div>
        @endforeach
    </div>

    <div class="w3l_categories">
        <h3>Chuyên mục</h3>
        <ul>
            @foreach ($categories as $category)
                <li>
                    <a href="singlepage.html">
                        <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="w3l_tags">
        <h3>Tags</h3>
        <ul class="tag">
            @foreach ($tags as $tag)
                <li><a href="singlepage.html">{{ $tag->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
