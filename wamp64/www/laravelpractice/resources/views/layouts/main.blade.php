<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laravel Practice</title>
    <link rel="stylesheet" href="{{ asset('css/foundation.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

        <div class="off-canvas position-left reveal-for-large" id="main-menu" data-off-canvas data-position="left">
            <div class="row column">
                <h5>Laravel Practice</h5>
                <ul class="menu vertical">
                    <li><a href="/">Home</a></li>
                    <?php
                    if (Auth::guest())
                    {
                    ?>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                    <?php
                    }
                    else
                    {
                    ?>
                    <li><a href="/gallery/create">Create gallery</a></li>
                    <li><a href="/logout">Logout</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        @yield('content')
    </div>
</div>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="{{asset('js/foundation.js')}}"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>



