<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>@yield('title')</title>
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/images/favicon.png') }}">
<!-- Custom Stylesheet -->
<link href="{{ asset('admin/css/style.css')}}" rel="stylesheet">
<link href="{{ asset('admin/css/main.css')}}" rel="stylesheet">

@stack('css-external')
@stack('css-internal')
