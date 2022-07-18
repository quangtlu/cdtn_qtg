<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('image/logo.png') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href={{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}>
    <link rel="stylesheet" href={{ asset('AdminLTE/dist/css/adminlte.min.css') }}>
    <link rel="stylesheet" href="{{ asset('admin/main.css') }}">
    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="wrapper" data-messageSuccess="{{ Session::get('success') }}"
        data-messageError="{{ Session::get('error') }}">
        @include('partials.admin.header')
        @include('partials.admin.sidebar')
        @yield('content')
        @include('partials.admin.footer')
    </div>
    <script src={{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}></script>
    <script src={{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('AdminLTE/dist/js/adminlte.min.js') }}></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module" src="{{ asset('admin/main.js') }}"></script>

    @yield('js')
</body>

</html>
