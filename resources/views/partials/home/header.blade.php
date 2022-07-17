<header>
    <div class="w3layouts-top-strip">
        <div class="container">
            @auth
                <div class="user-info-wrap">
                    <div class="user-info">
                        <img class="user-info__avt" src="{{ asset(config('consts.image.profile') . Auth::user()->image) }}"
                            alt="avatar">
                        <div>
                            <span class="user-info__name">{{ Auth::user()->name }}</span>
                            <ul class="dropdown-menu dropdown-menu__user-info ">
                                <li><a class="header-link user-name" href="{{ route('profile.index') }}">Thông tin cá
                                        nhân</a></li>
                                <li><a class="header-link user-name" href="{{ route('posts.myPost') }}">Bài viết của
                                        tôi</a></li>
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
                <h1><a href="{{ route('home.index') }}"><img class="logo-img animate__animated  animate__slideInDown"
                            src="{{ asset('logo.png') }}" alt=""></a></h1>
                <p class="animate__animated  animate__slideInUp">Quang Vinh Copyright</p>
            </div>
            <div class="w3ls-social-icons">
                @guest
                    <a class="btn btn-sm btn-success" href="{{ route('login') }}">Đăng nhập <i class="fa fa-sign-in"></i></a>
                    <a class="btn btn-sm btn-primary" href="{{ route('register') }}">Đăng ký <i class="fa fa-sign-in"></i></a>
                @endguest
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
                    <li><a class="{{ Request::is('/*') ? 'active' : '' }}" href="{{ route('home.index') }}">Trang
                            chủ</a></li>
                    {{-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">Quyền tác giả<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @if ($postReferences)
                                @foreach ($postReferences as $post)
                                    <li><a
                                            href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
                                    </li>
                                @endforeach
                                <li><a href="{{ route('home.index')}}">Xem tất cả</a></li>
                            @endif
                        </ul>
                    </li> --}}
                    <li><a class="{{ Request::is('faq') ? 'active' : '' }}"
                            href="{{ route('faq.index') }}">FAQ</a></li>
                    <li><a class="{{ Request::is('products*') ? 'active' : '' }}"
                            href="{{ route('products.index') }}">Tác phẩm</a></li>
                    <li><a class="{{ Request::is('posts*') ? 'active' : '' }}"
                            href="{{ route('posts.index') }}">Diễn đàn</a></li>
                    <li><a href="{{ route('messenger.index') }}" style="font-size: 25px"><i
                                class="fa fa-comments-o"></i></a></li>
                    @auth
                        <li class="notice-nav">
                            @if (Auth::user()->notifications->count())
                                <span class="fa fa-bell notification-icon {{ Auth::user()->notifications->first->unread() ? 'bell active' : '' }}"></span>
                                <div class="notification-container">
                                    <div class="row no-gutters justify-content-between align-items-center header-noti-wrap">
                                        <a class="col-md-6 text-primary read-all-noti-link" href="{{ route('notifications.markAsReadAll') }}"><i class="fa fa-check"></i> Đánh dấu tất cả là đã đọc</a>
                                        <a class="col-md-6 text-danger remove-all-noti-link" href="{{ route('notifications.deleteAll') }}"><i class="fa  fa-trash-o"></i> Xóa tất cả</a>
                                    </div>
                                    <ul class="notice-list">
                                        @foreach (Auth::user()->notifications as $notification)
                                        {{-- Comemnt notification --}}
                                            @if ($notification->type == 'App\Notifications\CommentNotification')
                                                <li class="notice-item panel {{ $notification->unread() ? 'unread' : '' }}"><a
                                                        href="{{ route('notifications.showPost', ['id' => $notification->id]) }}">
                                                        <div class="notice-item-wrap">
                                                            <img src="{{ asset(config('consts.image.profile') . $notification->data['user_image']) }}"
                                                                alt="" class="notice-item__avatar">
                                                            <div class="notice-item-content-wrap post-content-limit-line">
                                                                {!! $notification->data['title'] !!}:
                                                                '{{ $notification->data['content'] }}'
                                                                <div class="notice-item-content__time">
                                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                    {{ $notification->created_at->diffForHumans() }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a></li>
                                            {{-- Connect notification --}}
                                            @elseif ($notification->type == 'App\Notifications\ConnectNotification')
                                                <li class="notice-item panel {{ $notification->unread() ? 'unread' : '' }}">
                                                    <a
                                                        href="{{ route('notifications.showPost', ['id' => $notification->id]) }}">
                                                        <ul class="notification-item-list">
                                                            <li>
                                                                <p>{!! $notification->data['title'] !!}</p>
                                                            </li>
                                                            <li>
                                                                <p class="post-content-limit-line">{!! $notification->data['content'] !!}</p>
                                                            </li>
                                                            <li
                                                                class="notice-item-content__time ">
                                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                {{ $notification->created_at->diffForHumans() }}
                                                            </li>
                                                            <li>
                                                                <button class="btn btn-primary btn-sm btn-block text-center">
                                                                    <a style="color: white; font-size:14px"
                                                                        href="{{ route('messenger.show', ['id' => $notification->data['chatroom_id']]) }}">{{ $notification->data['text_btn'] }}
                                                                        <i class="fa fa-comments-o"></i></a>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </a>
                                                </li>
                                            {{-- post notification --}}
                                            @elseif ($notification->type == 'App\Notifications\PostRequestNotification' ||
                                                $notification->type == 'App\Notifications\PostResultNotification')
                                                <li class="notice-item panel {{ $notification->unread() ? 'unread' : '' }}">
                                                    <a
                                                        href="{{ route('notifications.showPost', ['id' => $notification->id]) }}">
                                                        <ul class="notification-item-list" style="list-style: none">
                                                            <li class="panel-header">
                                                                <p>{!! $notification->data['title'] !!}</p>
                                                            </li>
                                                            <li>
                                                                <p class="post-content-limit-line">{!! $notification->data['content'] !!}</p>
                                                            </li>
                                                            <li
                                                                class="notice-item-content__time ">
                                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                {{ $notification->created_at->diffForHumans() }}
                                                            </li>
                                                            {{-- handle request --}}
                                                            @if ($notification->type == 'App\Notifications\PostRequestNotification')
                                                                <li>
                                                                    <form
                                                                        action="{{ route('posts.handleRequest', ['id' => $notification->data['post_id']]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="noti_id"
                                                                            value="{{ $notification->id }}">
                                                                        <div style="display: flex; justify-content: center;">
                                                                            <input style="margin-right: 5px" type="submit"
                                                                                name="action" class="btn btn-danger"
                                                                                value="{{ config('consts.post.action.refuse') }}">
                                                                            <input style="margin-left: 5px" type="submit"
                                                                                name="action" class="btn btn-success"
                                                                                value="{{ config('consts.post.action.accept') }}">
                                                                        </div>
                                                                    </form>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @else 
                                <span class="fa fa-bell notification-icon"></span>
                                <div class="notification-container">
                                    <img class="no-notification-img" src="{{ asset('image/notification/no_notification.gif') }}" alt="">
                                    <h4 style="padding: 10px 0" class="active">Bạn không có thông báo nào</h4>
                                </div>
                            @endif
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
                    <form id="header-search-form" action="" method="GET">
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
