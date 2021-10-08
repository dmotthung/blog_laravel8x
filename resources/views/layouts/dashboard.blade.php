
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.templates.header')
    </head>
    <body>
    @include('layouts.templates.preload')
    <div id="main-wrapper">
        @include('layouts.templates.nav')
        @include('layouts.templates.sidebar')
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    @yield('breadcrumb')
                </div>
            </div>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">@yield('title')</h1>
                        @yield('content')
                    </div>
                </div>

            </div>
        </div>
        @include('layouts.templates.footer')
    </body>

</html>
