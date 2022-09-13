@extends('layouts.main')
@section('container')
    <div style="margin-top: 5rem; display: flex; justify-content:space-between">
        <i class="fa fa-bars only-mobile list-category-icon"></i>
        <div class="col-md-3 side-bar-left hide-on-mobile">@include('partials.home.list-category')</div>
        <div class="col-md-9 col-xs-12">@yield('content')</div>
    </div>
@endsection
