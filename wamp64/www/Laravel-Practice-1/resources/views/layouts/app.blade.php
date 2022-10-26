@include('includes/head')
@include('includes/header')
@include('includes/footer')
@include('includes/alert_message')
@include('includes/scripts')


    @yield('head')

    <body>
        @yield('header')

        @yield('alert_message')

        @yield('content')

        @yield('footer')

        @yield('scripts')
    </body>
</html>
