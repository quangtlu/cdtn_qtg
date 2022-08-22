@extends('layouts.main')
@section('container')
    <div style="margin-top: 5rem; display: flex; justify-content:space-between">
        <div class="col-md-3 side-bar-left">@include('partials.home.list-category')</div>
        <div class="col-md-9">@yield('content')</div>
    </div>
@endsection
