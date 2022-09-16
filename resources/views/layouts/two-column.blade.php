@extends('layouts.main')
@section('container')
    <div style="margin-top: 5rem; display: flex; justify-content:space-between">
        <div class="col-md-10 col-xs-12">@yield('content')</div>
        <div class="col-md-2 side-bar-right hide-on-mobile">@include('partials.home.list-counselor')</div>
    </div>
@endsection
