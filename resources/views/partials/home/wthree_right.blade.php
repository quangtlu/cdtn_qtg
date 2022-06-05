<div class="col-md-3 w3agile_blog_left">
    <div class="wthreesearch">
        <form action="#" method="post">
            <input type="search" name="Search" placeholder="Search here" required="">
            <button type="submit" class="btn btn-default search" aria-label="Left Align">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>

    </div>

    <div class="agileinfo_calender">
        <h3>CONNECT SOCIALLY</h3>
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
        <h3>Categories</h3>
        <ul>
            <li><a href="singlepage.html"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>tellus faucibus eleifend sit amet</a></li>
            <li><a href="singlepage.html"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>Mauris ut odio sed nisi convallis</a></li>
            <li><a href="singlepage.html"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>Curabitur a sapien et tellus faucibus</a></li>
            <li><a href="singlepage.html"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>porta nunc eget, lobortis nulla</a></li>
            <li><a href="singlepage.html"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>Sed ut metus turpis cursus convallis</a></li>
            <li><a href="singlepage.html"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>Maecenas cursus at ex a faucibus</a></li>
        </ul>
    </div>
    <div class="w3ls_recent_posts">
        <h3>Recent Posts</h3>
        <div class="agileits_recent_posts_grid">
            <div class="agileits_recent_posts_gridl">
                <div class="w3agile_special_deals_grid_left_grid">
                    <a href="singlepage.html"><img src="images/r1.jpg" class="img-responsive" alt="" /></a>
                </div>
            </div>
            <div class="agileits_recent_posts_gridr">
                <h4><a href="singlepage.html">velit esse quam nihil</a></h4>
                <h5><i class="fa fa-calendar" aria-hidden="true"></i>FEB 15,2017</h5>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="agileits_recent_posts_grid">
            <div class="agileits_recent_posts_gridl">
                <div class="w3agile_special_deals_grid_left_grid">
                    <a href="singlepage.html"><img src="images/r2.jpg" class="img-responsive" alt="" /></a>
                </div>
            </div>
            <div class="agileits_recent_posts_gridr">
                <h4><a href="singlepage.html">Class aptent taciti </a></h4>
                <h5><i class="fa fa-calendar" aria-hidden="true"></i>FEB 15,2017</h5>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="agileits_recent_posts_grid">
            <div class="agileits_recent_posts_gridl">
                <div class="w3agile_special_deals_grid_left_grid">
                    <a href="singlepage.html"><img src="images/r3.jpg" class="img-responsive" alt="" /></a>
                </div>
            </div>
            <div class="agileits_recent_posts_gridr">
                <h4><a href="singlepage.html">Maecenas eget erat </a></h4>
                <h5><i class="fa fa-calendar" aria-hidden="true"></i>FEB 15,2017</h5>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="w3l_tags">
        <h3>Tags</h3>
        <ul class="tag">
            <li><a href="singlepage.html">Fashion</a></li>
            <li><a href="singlepage.html">Photography</a></li>
            <li><a href="singlepage.html">Artist</a></li>
            <li><a href="singlepage.html">Music</a></li>
            <li><a href="singlepage.html">Shop</a></li>
            <li><a href="singlepage.html">Corporate</a></li>
            <li><a href="singlepage.html">Personal</a></li>
            <li><a href="singlepage.html">Restaurant</a></li>
            <li><a href="singlepage.html">Business</a></li>
        </ul>
    </div>
</div>
