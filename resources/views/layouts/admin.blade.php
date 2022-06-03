<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href={{ asset("AdminLTE/plugins/fontawesome-free/css/all.min.css")}} >
    <link rel="stylesheet" href={{ asset("AdminLTE/dist/css/adminlte.min.css") }} >
    <link rel="stylesheet" href="{{ asset("admin/alert.css") }}">
    <link rel="stylesheet" href="{{ asset('admin/profile/index.css') }}">
    @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
@include('partials.admin.header')
@include('partials.admin.sidebar')
    @include('partials.admin.flash-message')
    @yield('content')
@include('partials.admin.footer')
</div>
<script src={{ asset("AdminLTE/plugins/jquery/jquery.min.js") }}></script>
<script src={{ asset("AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
<script src={{ asset("AdminLTE/dist/js/adminlte.min.js") }}></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('admin/alert.js') }}"></script>

@yield('js')
</body>
</html>
