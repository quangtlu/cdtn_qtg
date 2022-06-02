@extends('layouts.home')
@section('title', 'Home')
@section('content')
    <div class="w3-slider">
        <!-- main-slider -->
        <ul id="demo1">
            <li>
                <img src="{{asset('template_blog/images/1.jpg')}}" alt="" />
                <!--Slider Description example-->
                <div class="slide-desc">
                    <h3>Fashion</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's dummy. </p>
                </div>
            </li>
            <li>
                <img src="{{asset('template_blog/images/2.jpg')}}" alt="" />
                <div class="slide-desc">
                    <h3>Life Style </h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                </div>
            </li>
            <li>
                <img src="{{asset('template_blog/images/3.jpg')}}" alt="" />
                <div class="slide-desc">
                    <h3>Photography</h3>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature. </p>
                </div>
            </li>

        </ul>
    </div>
        <div class="wthree-top">
            <div class="w3agile-top">
                <div class="w3agile_special_deals_grid_left_grid">
                    <a href="singlepage.html"><img src="{{ asset('template_blog/images/4.jpg') }}" class="img-responsive" alt="" /></a>
                </div>
                <div class="w3agile-middle">
                    <ul>
                        <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>FEB 15,2017</a></li>
                        <li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>201 LIKES</a></li>
                        <li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i>15 COMMENTS</a></li>

                    </ul>
                </div>
            </div>

            <div class="w3agile-bottom">
                <div class="col-md-3 w3agile-left">
                    <h5>Sit amet consectetur</h5>
                </div>
                <div class="col-md-9 w3agile-right">
                    <h3><a href="singlepage.html">Amet consectetur adipisicing </a></h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sedc dnmo eiusmod tempor incididunt ut labore et dolore magna aliqua uta enim ad minim ven iam quis nostrud exercitation ullamco labor nisi ut aliquip exea commodo consequat duis aute irudre dolor in elit sed uta labore dolore reprehender</p>
                    <a class="agileits w3layouts" href="singlepage.html">Read More <span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="wthree-top-1">
            <div class="w3agile-top">
                <section class="slider">
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                <div class="w3agile_special_deals_grid_left_grid">
                                    <a href="singlepage.html"><img src="{{ asset('template_blog/images/2.jpg') }}" class="img-responsive" alt="" /></a>
                                </div>
                            </li>
                            <li>
                                <div class="w3agile_special_deals_grid_left_grid">
                                    <a href="singlepage.html"><img src="{{ asset('template_blog/images/3.jpg') }}" class="img-responsive" alt="" /></a>
                                </div>
                            </li>
                            <li>
                                <div class="w3agile_special_deals_grid_left_grid">
                                    <a href="singlepage.html"><img src="{{ asset('template_blog/images/3.jpg') }}" class="img-responsive" alt="" /></a>
                                </div>
                            </li>
                        </ul>
                    </div>CONNECT SOCIALLY
                </section>
                <!-- flexSlider -->
                <script defer src="{{ asset('template_blog/js/jquery.flexslider.js') }}"></script>
                <script type="text/javascript">
                    $(window).load(function(){
                        $('.flexslider').flexslider({
                            animation: "slide",
                            start: function(slider){
                                $('body').removeClass('loading');
                            }
                        });
                    });
                </script>
                <!-- //flexSlider -->

                <div class="w3agile-middle">
                    <ul>
                        <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>FEB 15,2017</a></li>
                        <li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>201 LIKES</a></li>
                        <li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i>15 COMMENTS</a></li>

                    </ul>
                </div>
            </div>

            <div class="w3agile-bottom">
                <div class="col-md-3 w3agile-left">
                    <h5>Sit amet consectetur</h5>
                </div>
                <div class="col-md-9 w3agile-right">
                    <h3><a href="singlepage.html">Amet consectetur adipisicing </a></h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sedc dnmo eiusmod tempor incididunt ut labore et dolore magna aliqua uta enim ad minim ven iam quis nostrud exercitation ullamco labor nisi ut aliquip exea commodo consequat duis aute irudre dolor in elit sed uta labore dolore reprehender</p>
                    <a class="agileits w3layouts" href="singlepage.html">Read More <span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //wthree-top-1 -->
        <!-- wthree-top-1 -->
        <div class="wthree-top-1">
            <div class="w3agile-top">
                <iframe src="https://player.vimeo.com/video/37111758" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="w3agile-middle">
                    <ul>
                        <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>FEB 15,2017</a></li>
                        <li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>201 LIKES</a></li>
                        <li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i>15 COMMENTS</a></li>

                    </ul>
                </div>
            </div>

            <div class="w3agile-bottom">
                <div class="col-md-3 w3agile-left">
                    <h5>Sit amet consectetur</h5>
                </div>
                <div class="col-md-9 w3agile-right">
                    <h3><a href="singlepage.html">Amet consectetur adipisicing </a></h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sedc dnmo eiusmod tempor incididunt ut labore et dolore magna aliqua uta enim ad minim ven iam quis nostrud exercitation ullamco labor nisi ut aliquip exea commodo consequat duis aute irudre dolor in elit sed uta labore dolore reprehender</p>
                    <a class="agileits w3layouts" href="singlepage.html">Read More <span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //wthree-top-1 -->
        <div class="wthree-top-1">
            <div class="w3agile-top">
                <div class="col-md-6 w3-lft">
                    <div class="w3agile_special_deals_grid_left_grid">
                        <a href="singlepage.html"><img src="{{ asset('template_blog/images/5.jpg') }}" class="img-responsive" alt="" /></a>
                    </div>
                </div>
                <div class="col-md-6 w3-rgt">
                    <div class="w3-rgt-top">
                        <div class="w3agile_special_deals_grid_left_grid">
                            <a href="singlepage.html"><img src="{{ asset('template_blog/images/g6.jpg') }}" class="img-responsive" alt="" /></a>
                        </div>
                    </div>
                    <div class="w3-rgt-top1">
                        <div class="w3agile_special_deals_grid_left_grid">
                            <a href="singlepage.html"><img src="{{ asset('template_blog/images/g8.jpg') }}" class="img-responsive" alt="" /></a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="w3agile-middle">
                    <ul>
                        <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>FEB 15,2017</a></li>
                        <li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>201 LIKES</a></li>
                        <li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i>15 COMMENTS</a></li>

                    </ul>
                </div>
            </div>

            <div class="w3agile-bottom">
                <div class="col-md-3 w3agile-left">
                    <h5>Sit amet consectetur</h5>
                </div>
                <div class="col-md-9 w3agile-right">
                    <h3><a href="singlepage.html">Amet consectetur adipisicing </a></h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sedc dnmo eiusmod tempor incididunt ut labore et dolore magna aliqua uta enim ad minim ven iam quis nostrud exercitation ullamco labor nisi ut aliquip exea commodo consequat duis aute irudre dolor in elit sed uta labore dolore reprehender</p>
                    <a class="agileits w3layouts" href="singlepage.html">Read More <span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- wthree-top-1 -->
@endsection
