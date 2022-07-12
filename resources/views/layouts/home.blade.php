<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <link href="{{ asset('template_blog/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all" /><!-- fontawesome -->
    <link href="{{ asset('template_blog/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all" /><!-- Bootstrap stylesheet -->
    <link href="{{ asset('template_blog/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('template_blog/css/flexslider.css') }}" type="text/css" media="screen" property="" />
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.png') }}">
    <!-- stylesheet -->
    <!-- meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Quang Vinh copyright" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //meta tags -->
    <!--fonts-->
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!--//fonts-->
    <script type="text/javascript" src="{{ asset('template_blog/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('template_blog/js/main.js') }}"></script>
    <!-- Required-js -->
    <!-- main slider-banner -->
    <script src="{{ asset('template_blog/js/skdslider.min.js') }}"></script>
    <link href="{{ asset('template_blog/css/skdslider.css') }}" rel="stylesheet">
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});

            jQuery('#responsive').change(function(){
                $('#responsive_wrapper').width(jQuery(this).val());
            });

        });
    </script>
    <!-- //main slider-banner -->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="{{ asset('template_blog/js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template_blog/js/easing.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function() {
                    $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <link rel="stylesheet" href="{{ asset("home/alert.css") }}">
    <link rel="stylesheet" href="{{ asset('home/main.css') }}">
@yield('css')

</head>
<body>
<!-- header -->
@include('partials.home.header')
<div class="container" id="container" data-messageSuccess="{{ Session::get('success') }}" data-messageError="{{ Session::get('error') }}">
    <div class="banner-btm-agile">
        <div class="col-md-9 btm-wthree-left">@yield('content')</div>
        @include('partials.home.wthree_right')
        <div class="clearfix"></div>
    </div>
</div>
@include('partials.home.footer')
<script type="text/javascript">
    $(document).ready(function() {

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<script src="{{ asset('template_blog/js/bootstrap.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('home/alert.js') }}"></script>
<script src="{{ asset('home/main.js') }}"></script>
@yield('js')

</body>
</html>
