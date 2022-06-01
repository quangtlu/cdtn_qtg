@extends('layouts.home')
@section('title', $post->title )
@section('content')
    <div class="single-left1">
        @if($post->image != null)
        <img src="images/2.jpg" alt=" " class="img-responsive" />
        @endif
        <h3>{{ $post->title }}</h3>
        <ul>
            <li><span class="glyphicon glyphicon-user" aria-hidden="true"></span><a href="#">{{ $post->user->name }}</a></li>
            <li><span class="glyphicon glyphicon-tag" aria-hidden="true"></span><a href="#">5 Tags</a></li>
            <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="#">5 Comments</a></li>
        </ul>
        <p>{!! $post->content !!}</p>
    </div>
    <div class="comments">
        <h3>Our Recent Comments</h3>
        <div class="comments-grids">
            <div class="comments-grid">
                <div class="comments-grid-left">
                    <img src="images/3.png" alt=" " class="img-responsive" />
                </div>
                <div class="comments-grid-right">
                    <h4><a href="#">Michael Crisp</a></h4>
                    <ul>
                        <li>5 December 2016 <i>|</i></li>
                        <li><a href="#">Reply</a></li>
                    </ul>
                    <p>Ut ex metus, ornare ac ultricies sit amet, auctor a elit. Praesent sit
                        amet scelerisque massa. Duis porta risus id urna finibus aliquet.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="comments-grid">
                <div class="comments-grid-left">
                    <img src="images/2.png" alt=" " class="img-responsive" />
                </div>
                <div class="comments-grid-right">
                    <h4><a href="#">Adam Lii</a></h4>
                    <ul>
                        <li>8 December 2016 <i>|</i></li>
                        <li><a href="#">Reply</a></li>
                    </ul>
                    <p>Ut ex metus, ornare ac ultricies sit amet, auctor a elit. Praesent sit
                        amet scelerisque massa. Duis porta risus id urna finibus aliquet.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="comments-grid">
                <div class="comments-grid-left">
                    <img src="images/1.png" alt=" " class="img-responsive" />
                </div>
                <div class="comments-grid-right">
                    <h4><a href="#">Richard Carl</a></h4>
                    <ul>
                        <li>11 December 2016 <i>|</i></li>
                        <li><a href="#">Reply</a></li>
                    </ul>
                    <p>Ut ex metus, ornare ac ultricies sit amet, auctor a elit. Praesent sit
                        amet scelerisque massa. Duis porta risus id urna finibus aliquet.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="comments-grid">
                <div class="comments-grid-left">
                    <img src="images/4.png" alt=" " class="img-responsive" />
                </div>
                <div class="comments-grid-right">
                    <h4><a href="#">Thomas Paul</a></h4>
                    <ul>
                        <li>14 December 2016 <i>|</i></li>
                        <li><a href="#">Reply</a></li>
                    </ul>
                    <p>Ut ex metus, ornare ac ultricies sit amet, auctor a elit. Praesent sit
                        amet scelerisque massa. Duis porta risus id urna finibus aliquet.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div class="leave-coment-form">
        <h3>Bình luận</h3>
        <form action="#" method="post">
            <textarea name="Message" placeholder="Nhập bình luận..." required=""></textarea>
            <div class="w3_single_submit">
                <input type="submit" value="Gửi" >
            </div>
        </form>
    </div>
@endsection
