<!-- footer -->
<div class="footer-agile-info">
    <div class="container">
        <div class="col-md-3 w3layouts-footer">
            <h3>Liên hệ</h3>
            <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>Hà Nội, Việt Nam</p>
            <p><span><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="#">quangvinh.copyright@gmail.com</a> </p>
            <p><span><i class="fa fa-mobile" aria-hidden="true"></i></span>P: +254 2564584 / +542 8245658 </p>
            <p><span><i class="fa fa-globe" aria-hidden="true"></i></span><a href="#">www.quang-vinh.com</a></p>
        </div>
        <div class="col-md-3 wthree-footer" style="width:30%">
            <h2>Quang Vinh Copyright</h2>
            <p>Trang web cho phép tìm kiếm tác phẩm, diễn đàn trao đổi và tư vấn về khai thác các tác phẩm được bảo hộ về quyền tác giả.</p>
        </div>
        <div class="col-md-3 w3-agile" style="width:30%">
            <h3>Trò chuyện với chuyên gia</h3>
            <p>Người dùng được tư vấn trực tiếp, cụ thể mọi thắc mắc về quyền tác giả</p>
            <a class="btn btn-success" href="{{ route('messenger.index') }}">Trò chuyện ngay</a>
        </div>
        <div class="col-md-3" style="width:15%">
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
                                @hasanyrole('admin|mod')
                                    <li><a class="header-link user-name" href="{{ route('posts.getPotRequest') }}">Kiểm duyệt bài viết</a></li>
                                @endhasanyrole
                                <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{-- <span class="header-link-logout">Đăng xuất</span> --}}
                                        Đăng xuất
                                        <i
                                            class="fa fa-sign-in text-danger" style="padding-left: 10px"></i>
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
        </div>
    </div>
    <div class="w3ls-social-icons">
        @guest
            <a class="btn btn-sm btn-success" href="{{ route('login') }}">Đăng nhập <i class="fa fa-sign-in"></i></a>
            <a class="btn btn-sm btn-primary" href="{{ route('register') }}">Đăng ký <i class="fa fa-sign-in"></i></a>
        @endguest
    </div>
</div>
<!-- footer -->
<!-- copyright -->
<div class="copyright">
    <div class="container">
        <div class="agileinfo">
            <p>Quang Vinh © Copyright - All Rights Reserved</p>
        </div>
    </div>
</div>
<!-- //copyright -->
<!-- here stars scrolling icon -->
