<header>
    <div class="w3layouts-top-strip">
        <div class="container">
            @auth
                <div class="user-info-wrap">
                    <div class="user-info">
                        <img class="user-info__avt" src="{{ asset(config('consts.image.profile') . Auth::user()->image) }}"
                            alt="avatar">
                        <div class="dropdown">
                            <span class="user-info__name dropdown-toggle"
                                data-toggle="dropdown">{{ Auth::user()->name }}</span>
                            <ul class="dropdown-menu dropdown-menu__user-info ">
                                <li><a class="header-link user-name" href="{{ route('profile.index') }}">Thông tin cá
                                        nhân</a></li>
                                <li><a class="header-link user-name" href="{{ route('posts.getPostByUser', ['id' => Auth::user()->id]) }}">Bài viết của tôi</a></li>
                                <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                        <span class="header-link-logout">Đăng xuất</span><i
                                            class="fa fa-sign-in text-danger"></i>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                        <input type="hidden" name="url_redirect_name" value="home.index">
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endauth
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


                @endauth
            </div>
        </div>
    </div>
    <!-- navigation -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">Quyền tác giả<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @if ($postReferences)
                                @foreach ($postReferences as $post)
                                    <li><a
                                            href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li><a href="{{ route('faq.index') }}">FAQ</a></li>
                    <li><a href="{{ route('posts.index') }}">Diễn đàn</a></li>
                    <li><a href="{{ route('messenger.index') }}">Trò chuyện</a></li>
                    @auth
                        <li class="notice-nav"><a>
                                <i class="fa fa-bell notice-icon"></i>
                                <ul class="notice-list">
                                    @if (Auth::user()->notifications)
                                        @foreach (Auth::user()->notifications as $notification)
                                            <li class="notice-item"><a
                                                    href="{{ route('posts.show', ['id' => $notification->data['post_id']]) }}#{{ $notification->data['comment_id'] }}">
                                                    <div class="notice-item-wrap">
                                                        <img src="{{ asset(config('consts.image.profile') . $notification->data['user_image']) }}"
                                                            alt="" class="notice-item__avatar">
                                                        <div class="notice-item-content-wrap post-content-limit-line">
                                                            {!! $notification->data['title'] !!}:
                                                            '{{ $notification->data['content'] }}'
                                                            <div class="notice-item-content__time">
                                                                {{ $notification->created_at->diffForHumans() }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </a>
                        </li>
                    @endauth
                </ul>
            </div><!-- /.navbar-collapse -->
            <div class="w3_agile_login">
                <div class="cd-main-header">
                    <a class="cd-search-trigger" href="#cd-search"> <span></span></a>
                    <!-- cd-header-buttons -->
                </div>
                <div id="cd-search" class="cd-search">
                    <form id="header-search-form" action="{{ route('posts.search') }}" method="GET">
                        <input id="search-input" required name="keyword" type="search"
                            placeholder="Tìm kiếm bài viết theo tiêu dề, nội dung,...">
                    </form>
                </div>
            </div>
            <div class="clearfix"> </div>

        </div><!-- /.container-fluid -->
    </nav>

    <!-- //navigation -->
</header>
