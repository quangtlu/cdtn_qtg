<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>@yield('title')</title>

    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Jost:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('image/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="{{ asset('template_signin_signup/css/style.css') }} " type="text/css" media="all" />
    <!-- fontawesome v5 -->
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
    @yield('css')
    <style>
        .label-required::after {
            content: "*";
            color: red;
            padding-left: 2px;
        }
    </style>
</head>

<body>

    <section class="forms">
        <div class="container">
            <div class="forms-grid">
                @yield('content')
            </div>
        </div>
    </section>
    <script src={{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}></script>
    <script src="{{ asset('js/showPasswordAuth.js') }}"></script>
    @yield('js')
</body>

</html>
