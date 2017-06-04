<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        @include('admin.includes.css')
    </head>

    <body>

        @include('admin.includes.navigation')
        @yield('content')
        @include('admin.includes.js')

    </body>
</html>