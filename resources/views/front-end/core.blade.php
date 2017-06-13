<!DOCTYPE html>
<html>
<head>
    @include('front-end.includes.meta')
    <title>@yield('title')</title>
    @include('front-end.includes.css')
    @yield('scriptInHead')
</head>

<body>

@include('front-end.includes.navigation')
@yield('content')


@include('front-end.includes.js')
@yield('script')

</body>
</html>