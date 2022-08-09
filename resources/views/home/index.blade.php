@extends('layouts.one-column')
@section('title', 'Trang chủ')
@section('css')
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="home-section">
            <h4 class="title-section-page">Giới thiệu</h4>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <p>Chào mừng Bạn đọc đến với trang web “Về các
                            Quyền
                            sở hữu trí tuệ” của Đại học
                            Thăng Long.
                            Đây là nơi trao đổi những kiến thức phổ thông và cơ bản cần thiết về các Quyền sở hữu trí tuệ
                            (SHTT), đặc biệt là về Quyền tác giả (QTG) và Quyền liên quan (QLQ) trong các hoạt động của các
                            Trường đại học, nói riêng tại Đại học Thăng Long.
                        </p>
                    </div>
                    <div class="item">
                        <p>Trên trang web này chúng tôi sẽ trao đổi về các
                            chủ
                            đề thiết thực liên quan đến
                            bảo hộ và sử dụng các quyền SHTT, đặc biệt là QTG/QLQ, trong công việc giảng dạy và nghiên cứu
                            khoa
                            học ở Đại học, trước hết là:
                            <br> - Quyền tác giả đối với các sản phẩm được giảng viên tạo ra trong hoạt động giảng dạy;
                            <br> - Quyền tác giả khi xuất bản các tác phẩm, công bố các kết quả nghiên cứu – nói riêng là
                            đối
                            với các
                            bài báo khoa học;
                            <br> - Sử dụng tác phẩm được bảo hộ quyền tác giả và quyền liên quan khi xây dựng các bài giảng
                            và
                            các
                            học liệu khác;
                            <br> - Sử dụng tác phẩm được bảo hộ quyền tác giả trong giảng dạy trực tuyến;
                            <br> - Và các chủ đề khác nảy sinh trong hoạt động thực tiễn của giảng viên và nghiên cứu viên
                            trong
                            Trường.
                        </p>
                    </div>
                    <div class="item">
                        <p>
                            Trang web cũng là nơi giới thiệu các hoạt động, cũng như các kết quả nghiên cứu, các sản phẩm
                            sáng
                            tạo, các kinh nghiệm thực tế trong việc bảo hộ và khai thác các tài sản trí tuệ trong môi trường
                            Đại
                            học. Tuy nhiên đây không phải là một địa chỉ tư vấn pháp lý về SHTT – là nhiệm vụ của các Công
                            ty
                            Luật tương ứng.
                            Chúng tôi mong được sự ủng hộ, góp ý và phê bình của độc giả để trang web ngày càng hoàn thiện,
                            đáp
                            ứng tốt hơn các nhu cầu tra cứu, tìm hiểu, và trao đổi kinh nghiêm của Bạn đọc về các Quyền
                            SHTT.
                            <br> Địa chỉ liên hệ:

                        </p>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left arow-slide-icon arow-slide-left"
                        aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right arow-slide-icon arow-slide-right"
                        aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="home-section wow fadeInUp">
            <h4 class="title-section-page">Top <span class="active">{{ $categories->count() }}</span> chủ đề được quan tâm
                nhất</h4>
            <ul class="top-list">
                @foreach ($categories as $index => $category)
                    <li><a class="top-item__link" href="{{ route('posts.getPostByCategory', ['id' => $category->id]) }}">
                            <span>{{ $index + 1 }}. </span> {{ $category->name }}
                        </a></li>
                @endforeach
            </ul>
        </div>
        <div class="home-section wow fadeInUp">
            <h4 class="title-section-page">Top <span class="active">{{ $posts->count() }}</span> bài viết phổ biến nhất</h4>
            @include('home.component.posts.list', ['posts' => $posts, 'isTop' => true])
        </div>
        <div class="home-section wow fadeInUp">
            <h4 class="title-section-page">Top chuyên gia tư vấn</h4>
            <div class="row counselor-list">
                @foreach ($users as $user)
                    <div class="col-md-3 counselor-item">
                        <div class="counselor-item-wrap">
                            <img src="{{ asset('image/profile') . '/' . $user->image }}" alt=""
                                class="counselor-item__avt">
                            <div class="couselor-item-info">
                                <ul>
                                    <li>
                                        <h4 class="active">{{ $user->name }}</h4>
                                    </li>
                                    <li>
                                        <a data-toggle="modal" data-target="#myModal-{{ $user->id }}"
                                            class="agileits w3layouts counselor-button">Thông tin</a>
                                        <a href="" class="agileits w3layouts counselor-button button-active">Hẹn tư
                                            vấn</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal-{{ $user->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h3 class="modal-title" id="myModalLabel">Thông tin chuyên gia tư vấn</h3>
                                </div>
                                <div class="modal-body counselor-info-detail">
                                    <ul class="counselor-info-detail__list">
                                        <li><b>Họ tên: </b>{{ $user->name }}</li>
                                        <li><b>Giới tính: </b>{{ $user->gender_text }}</li>
                                        <li><b>Tuổi: </b>{{ $user->age }}</li>
                                        <li><b>Chuyên môn: </b>
                                            @if ($user->categories->count())
                                                @foreach ($user->categories as $index => $category)
                                                    <a
                                                        href="{{ route('posts.getPostByCategory', ['id' => $category->id]) }}">
                                                        {{ $index + 1 != $categories->count() ? $category->name . ', ' : $category->name }}
                                                    </a>
                                                @endforeach
                                            @else
                                                Chưa rõ
                                            @endif
                                        </li>
                                        <li><b>Email: </b>{{ $user->email }}</li>
                                        <li><b>SDT: </b>{{ $user->phone }}</li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <a class="agileits w3layouts counselor-button" data-dismiss="modal">Đóng</a>
                                    <a class="agileits w3layouts counselor-button button-active">Hẹn tư vấn</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.carousel').carousel({
            interval: 10000
        })
        $('#search').click(function() {
            $('#toggle').fadeToggle();
        });

        $('#header-search-form').attr('action', '{{ route('posts.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm bài viết theo tiêu đề, nội dung, tác giả...');
    </script>
    <style>
        .carousel-control {
            width: 0 !important;
        }

        .arow-slide-icon {
            font-size: 20px !important;
            color: var(--red-color);
        }

        .carousel-inner .item {
            color: #fff !important;
            padding: 30px !important;
            height: 190px !important;
            background-color: #000333 !important;
        }

        .arow-slide-left {
            left: auto !important;
            right: 0 !important;
        }

        .arow-slide-right {
            right: auto !important;
        }
    </style>
@endsection
