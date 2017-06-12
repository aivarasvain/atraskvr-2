<!DOCTYPE html>
<html>
    <head>
        @include('admin.includes.meta')
        <title>@yield('title')</title>
        @include('admin.includes.css')
    </head>

    <body class="hold-transition skin-red sidebar-mini">

        @include('admin.includes.header')
        @include('admin.includes.navigation')

        <div class="wrapper">
            <div class="content-wrapper">
                @yield('content')
            </div>
            @include('admin.includes.footer')
        </div>


        @include('admin.includes.js')

        @yield('script')

    </body>
</html>