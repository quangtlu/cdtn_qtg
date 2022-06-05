<header>
    <div class="w3layouts-top-strip">
        <div class="container">
            <div class="logo">
                <h1><a href="{{ route('home.index') }}">Quang Vinh Copyright</a></h1>
                <p>Thanng Long University</p>
            </div>
            <div class="w3ls-social-icons">
                @guest
                    <a class="header-link" href="{{ route('login') }}">Đăng nhập <i class="fa fa-sign-in"></i></a>
                    <a class="header-link" href="{{ route('register') }}">Đăng ký <i class="fa fa-sign-in"></i></a>
                @endguest
                @auth
                    <a class="header-link user-name" href="features.html">{{ Auth::user()->name }}</a>
                        <a class="header-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            Đăng xuất<i class="fa fa-sign-in text-danger"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            <input type="hidden" name="url_redirect_name" value="home.index">
                        </form>
                @endauth
            </div>
        </div>
    </div>
    <!-- navigation -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a class="active" href="{{ route('home.index') }}">Trang chủ</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quyền tác giả<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="">Các khái niệm liên quan</a></li>
                            <li><a href="">Luật sở hữu trí tuệ Việt Nam 2005</a></li>
                            <li><a href="">Các vấn đề thường gặp</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('faq.index') }}">FAQ</a></li>
                    <li><a href="{{route('posts.index')}}">Diễn đàm</a></li>
                    <li><a href="{{route('messenger.index')}}">Trò chuyện</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
            <div class="w3_agile_login">
                <div class="cd-main-header">
                    <a class="cd-search-trigger" href="#cd-search"> <span></span></a>
                    <!-- cd-header-buttons -->
                </div>
                <div id="cd-search" class="cd-search">
                    <form action="#" method="post">
                        <input name="Search" type="search" placeholder="Search...">
                    </form>
                </div>
            </div>
            <div class="clearfix"> </div>

        </div><!-- /.container-fluid -->
    </nav>

    <!-- //navigation -->
</header>
