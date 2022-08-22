@extends('layouts.main')
@section('container')
    <div style="margin-top: 5rem; display: flex; justify-content:space-between">
        <div class="col-md-10">@yield('content')</div>
        <div class="col-md-2 side-bar-right">@include('partials.home.list-counselor')</div>
    </div>
@endsection
