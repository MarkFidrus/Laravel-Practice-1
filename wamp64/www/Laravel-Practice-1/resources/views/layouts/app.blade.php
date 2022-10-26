@include('includes/header')
@include('includes/footer')
@include('includes/alert_message')
@include('includes/scripts')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Practice</title>
</head>
<body>
@yield('header')

@yield('alert_message')

@yield('content')

@yield('footer')

@yield('scripts')
</body>
</html>
