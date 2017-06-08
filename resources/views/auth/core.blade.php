<html>
    <head>
        @include('auth.includes.meta')
        <title>@yield('title')</title>
        @include('auth.includes.css')
    </head>

    <body class="hold-transition login-page">
        @yield('content')
        @include('auth.includes.js')
    </body>


</html>