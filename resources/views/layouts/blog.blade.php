<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title')</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" itemprop='description' content="@yield('description')">
    <meta name="keywords" content="@yield('keyword')">
    <meta name="author" content="DMO Trương Thanh Hưng">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="canonical" href="{{url()->current()}}"/>

    <link rel="shortcut icon" href="{{ asset('blog/favicon.ico') }}">
    <!-- FontAwesome JS-->
    <script defer src="{{ asset('blog/assets/fontawesome/js/all.min.js') }}"></script>
    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('blog/assets/css/theme-1.css') }}">
    <link id="theme-style" rel="stylesheet" href="{{ asset('blog/assets/css/main.css') }}">
    @stack('css-internal')
    @stack('css-external')
</head>
<body>
@include('layouts._blog.header')
<div class="main-wrapper">
@yield('content')
</div>
@include('layouts._blog.footer')
<!-- Javascript -->
<script src="{{ asset('blog/assets/plugins/popper.min.js') }}"></script>
<script src="{{ asset('blog/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
@stack('javascript-external')
@stack('javascript-internal')
</body>
</html>
