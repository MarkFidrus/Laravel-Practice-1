@include('includes/head')
@include('includes/header')
@include('includes.footer_short')
@include('includes.footer_long')
@include('includes/alert_message')
@include('includes/scripts')


    @yield('head')

    <body>
        @yield('header')

        @yield('alert_message')

        @yield('content')

        @if(Route::is('login') || Route::is('home') || Route::is('register'))
            @yield('footer_short')
        @else
            @yield('footer_long')
        @endif


        @yield('scripts')
    </body>
</html>
