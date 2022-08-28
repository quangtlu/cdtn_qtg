<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        @auth
            @if (Auth::user()->unreadNotifications()->count() > 0)
                ({{ Auth::user()->unreadNotifications()->count() }})
            @endif
        @endauth
        @yield('title')
    </title>
    <link href="{{ asset('template_blog/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('template_blog/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="{{ asset('template_blog/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link rel="icon" type="image/x-icon" href="{{ asset('image/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Quang Vinh copyright" />
    <link
        href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('template_blog/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('template_blog/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template_blog/js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template_blog/js/easing.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('home/main.css') }}">
    @yield('css')

</head>

<body>
    <!-- header -->
    @include('partials.home.header')
    <div class="container" style="padding-top: 89px" id="container" data-messageSuccess="{{ Session::get('success') }}"
        data-messageError="{{ Session::get('error') }}">
        @yield('container')
    </div>
    @include('partials.home.footer')
    <script src="{{ asset('template_blog/js/bootstrap.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script type="module" src="{{ asset('home/main.js') }}"></script>
    @yield('js')
</body>

</html>
