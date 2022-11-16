<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!--bootstrap css -->
    <link rel="stylesheet" href="{{asset('bootstrap4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    @yield('extra_css')
    
</head>
<body>
    @yield('content')
</body>
    <!-- bootstrap js-->
    <script src="{{asset('bootstrap4/js/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap4/js/bootstrap.bundle.js')}}"></script>

    @yield('scripts')
</html>
