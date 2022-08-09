<!-- footer -->
<div class="footer-agile-info">
    <div class="container">
        <div class="col-md-4 w3layouts-footer">
            <h3>Liên hệ</h3>
            <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>Hà Nội, Việt Nam</p>
            <p><span><i class="fa fa-envelope" aria-hidden="true"></i></span><a
                    href="#">quangvinh.copyright@gmail.com</a> </p>
            <p><span><i class="fa fa-mobile" aria-hidden="true"></i></span>P: +254 2564584 / +542 8245658 </p>
            <p><span><i class="fa fa-globe" aria-hidden="true"></i></span><a href="#">www.quang-vinh.com</a></p>
        </div>
        <div class="col-md-4 wthree-footer" style="width:30%">
            <h2>Quang Vinh Copyright</h2>
            <p>Trang web cho phép tìm kiếm tác phẩm, diễn đàn trao đổi và tư vấn về khai thác các tác phẩm được bảo hộ
                về quyền tác giả.</p>
        </div>
        <div class="col-md-4 w3-agile" style="width:30%">
            <h3>Trò chuyện với chuyên gia</h3>
            <p>Người dùng được tư vấn trực tiếp, cụ thể mọi thắc mắc về quyền tác giả</p>
            <a class="btn btn-success" href="{{ route('messenger.index') }}">Trò chuyện ngay</a>
        </div>
        <!-- copyright -->

    </div>
    <div class="w3ls-social-icons">
        @guest
            <a class="btn btn-sm btn-success" href="{{ route('login') }}">Đăng nhập <i class="fa fa-sign-in"></i></a>
            <a class="btn btn-sm btn-primary" href="{{ route('register') }}">Đăng ký <i class="fa fa-sign-in"></i></a>
        @endguest
    </div>
    <div class="copyright container">
        <div class="agileinfo">
            <p>Copyright © 2022 Thang Long University. All rights reserved.</p>
        </div>
    </div>
</div>
