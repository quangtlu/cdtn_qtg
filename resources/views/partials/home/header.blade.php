<header class="animate__animated animate__fadeInDown">
    <!-- navigation -->
    <nav class="navbar navbar-default navbar-custom">
        <div class="container">
            <div class="row" style="display: flex; align-items:center">
                <div class="col-md-2">
                    <img class="logo-tlu" src="{{ asset('image/logo.svg') }}" alt="">
                </div>
                <div class="col-md-10">
                    <ul class="nav navbar-nav" @auth style="margin-top: 0;" @endauth>
                        <li><a class="{{ Request::is('/*') ? 'active' : '' }}" href="{{ route('home.index') }}">Trang
                                chủ</a></li>
                        <li><a href="{{ route('posts.getPostByCategory', ['id' => $refrenceChildCategories->first()->id]) }}"
                                class="{{ Request::is('posts/category/*') ? 'active' : '' }}">Về QSHTT</a></li>
                        <li><a href="{{ route('documentLaws.index') }}"
                                class="{{ Request::is('document-laws*') ? 'active' : '' }}">Văn bản pháp luật</a></li>
                        <li><a class="{{ Request::is('faq') ? 'active' : '' }}" href="{{ route('faq.index') }}">FAQ</a>
                        </li>
                        <span class="active">|</span>
                        <li><a class="{{ Request::is('posts/forum*') ? 'active' : '' }}"
                                href="{{ route('posts.index') }}">Diễn đàn</a></li>
                        <li><a href="{{ route('messenger.index') }}">Tư vấn</a></li>
                        @auth
                            <li class="notice-nav" data-noimg="{{ asset('image/notification/no_notification.gif') }}">
                                @if (Auth::user()->notifications->count())
                                    <span
                                        class="fa fa-bell notification-icon {{ Auth::user()->notifications->first->unread() ? 'bell' : '' }}"></span>
                                    <span class="fake-element">
                                        @if (Auth::user()->unreadNotifications()->count() > 0)
                                            <span
                                                class="number-notification">{{ Auth::user()->unreadNotifications()->count() }}</span>
                                        @endif
                                    </span>
                                    <div id="has-notification" class="notification-container">
                                        <div
                                            class="row no-gutters justify-content-between align-items-center header-noti-wrap">
                                            <a class="col-md-6 read-all-noti-link"
                                                href="{{ route('notifications.markAsReadAll') }}"><i
                                                    class="fa fa-check"></i> Đánh dấu tất cả là đã đọc</a>
                                            <a class="col-md-6 remove-all-noti-link"
                                                href="{{ route('notifications.deleteAll') }}"><i
                                                    class="fa  fa-trash-o"></i> Xóa tất cả</a>
                                        </div>
                                        <ul class="notice-list">
                                            @foreach (Auth::user()->notifications as $notification)
                                                {{-- Comemnt notification --}}
                                                @if ($notification->type == 'App\Notifications\CommentNotification')
                                                    <li
                                                        class="notice-item panel {{ $notification->unread() ? 'unread' : '' }}">
                                                        <a
                                                            href="{{ route('notifications.showPost', ['id' => $notification->id]) }}">
                                                            <div class="notice-item-wrap">
                                                                <img src="{{ asset(config('consts.image.profile') . $notification->data['user_image']) }}"
                                                                    alt="" class="notice-item__avatar">
                                                                <div class="notice-item-content-wrap limit-line-2">
                                                                    {!! $notification->data['title'] !!}:
                                                                    '{{ $notification->data['content'] }}'
                                                                    <div class="notice-item-content__time">
                                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                        {{ $notification->created_at->diffForHumans() }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    {{-- Connect notification --}}
                                                @elseif ($notification->type == 'App\Notifications\ConnectNotification')
                                                    <li
                                                        class="notice-item panel {{ $notification->unread() ? 'unread' : '' }}">
                                                        <a
                                                            href="{{ route('notifications.showPost', ['id' => $notification->id]) }}">
                                                            <ul class="notification-item-list">
                                                                <li>
                                                                    <p>{!! $notification->data['title'] !!}</p>
                                                                </li>
                                                                <li>
                                                                    <p class="limit-line-2">
                                                                        {!! $notification->data['content'] !!}</p>
                                                                </li>
                                                                <li class="notice-item-content__time ">
                                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                    {{ $notification->created_at->diffForHumans() }}
                                                                </li>
                                                                <li>
                                                                    <button
                                                                        class="btn btn-primary btn-sm btn-block text-center">
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
                                                    <li
                                                        class="notice-item panel {{ $notification->unread() ? 'unread' : '' }}">
                                                        <a
                                                            href="{{ route('notifications.showPost', ['id' => $notification->id]) }}">
                                                            <ul class="notification-item-list" style="list-style: none">
                                                                <li class="panel-header">
                                                                    <p>{!! $notification->data['title'] !!}</p>
                                                                </li>
                                                                <li>
                                                                    <p class="limit-line-2">
                                                                        {!! $notification->data['content'] !!}</p>
                                                                </li>
                                                                <li class="notice-item-content__time ">
                                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                    {{ $notification->created_at->diffForHumans() }}
                                                                </li>
                                                                {{-- handle request --}}
                                                                @if ($notification->type == 'App\Notifications\PostRequestNotification')
                                                                    <li>
                                                                        <form class="hanle-request-form"
                                                                            action="{{ route('posts.handleRequest', ['id' => $notification->data['post_id']]) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="noti_id"
                                                                                value="{{ $notification->id }}">
                                                                            <div
                                                                                style="display: flex; justify-content: center;">
                                                                                <button data-screen='header'
                                                                                    data-action="{{ config('consts.post.action.refuse') }}"
                                                                                    style="margin-right: 5px"
                                                                                    class="btn btn-danger action-btn">
                                                                                    {{ config('consts.post.action.refuse') }}
                                                                                </button>
                                                                                <button data-screen='header'
                                                                                    data-action="{{ config('consts.post.action.accept') }}"
                                                                                    class="action-btn btn btn-success"
                                                                                    style="margin-left: 5px">
                                                                                    {{ config('consts.post.action.accept') }}
                                                                                </button>
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
                                        <img class="no-notification-img"
                                            src="{{ asset('image/notification/no_notification.gif') }}" alt="">
                                        <h4 style="padding: 10px 0" class="active">Bạn không có thông báo nào</h4>
                                    </div>
                                @endif
                            </li>
                        @endauth
                        <li><a class="icon-search-header fa fa-search" href="#cd-search"> <span></span></a></li>
                        @guest
                            <div class="btn-group">
                                <a style="font-size: 13px !important" href="{{ route('register') }}" class="btn btn button-primary button-sm">Đăng ký</a>
                                <a style="font-size: 13px !important" href="{{ route('login') }}" class="btn button-active button-sm">Đăng nhập</a>
                            </div>
                        @endguest

                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
            <div id="cd-search" class="cd-search">
                <form id="header-search-form" action="{{ route('posts.index') }}" method="GET">
                    <input id="search-input" required name="keyword" type="search"
                        placeholder="Tìm kiếm bài viết theo tiêu dề, nội dung,...">
                </form>
                <ul class="search-result-list">

                    {{-- <button type="submit">Xem tất cả</button> --}}
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <!-- //navigation -->
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
                        <li><a class="header-link user-name" href="{{ route('posts.myPost') }}">Bài
                                viết của
                                tôi</a></li>
                        @hasanyrole('admin|mod')
                            <li><a class="header-link user-name" href="{{ route('posts.getPotRequest') }}">Kiểm duyệt
                                    bài viết</a></li>
                            <li><a class="header-link user-name" href="{{ route('admin.dashboard.index') }}">Trang quản
                                    trị</a></li>
                        @endhasanyrole
                        <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{-- <span class="header-link-logout">Đăng xuất</span> --}}
                                Đăng xuất
                                <i class="fa fa-sign-in text-danger" style="padding-left: 10px"></i>
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
</header>
