<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.png') }}">
    <link rel="stylesheet" href="{{ asset('errors/main.css') }}">
</head>
<body>
    <svg xmlns="http://www.w3.org/2000/svg" id="robot-error" viewBox="0 0 260 118.9">
        <defs>
            <clipPath id="white-clip"><circle id="white-eye" fill="#cacaca" cx="130" cy="65" r="20" /> </clipPath>
         <text id="text-s" class="error-text" y="106">@yield('status_code')</text>
        </defs>
          <path class="alarm" fill="#e62326" d="M120.9 19.6V9.1c0-5 4.1-9.1 9.1-9.1h0c5 0 9.1 4.1 9.1 9.1v10.6" />
         <use xlink:href="#text-s" x="-0.5px" y="-1px" fill="black"></use>
         <use xlink:href="#text-s" fill="#2b2b2b"></use>
        <g id="robot">
          <g id="eye-wrap">
            <use xlink:href="#white-eye"></use>
            <circle id="eyef" class="eye" clip-path="url(#white-clip)" fill="#000" stroke="#2aa7cc" stroke-width="2" stroke-miterlimit="10" cx="130" cy="65" r="11" />
    <ellipse id="white-eye" fill="#2b2b2b" cx="130" cy="40" rx="18" ry="12" />
          </g>
          <circle class="lightblue" cx="105" cy="32" r="2.5" id="tornillo" />
          <use xlink:href="#tornillo" x="50"></use>
          <use xlink:href="#tornillo" x="50" y="60"></use>
          <use xlink:href="#tornillo" y="60"></use>
        </g>
      </svg>
    <h1>@yield('title')</h1>
    <h2>Trở về <a target="_blank" href="{{ route('home.index') }}">Trang chủ</a></h2>
    <script src="{{ asset('errors/main.js') }}"></script>
</body>
</html>