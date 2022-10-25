@section('header')
    <header class="header">
        <nav class="header-navigation">
            <ul class="header-navigation-menu">
                <li class="header-navigation-menu-item"><a class="header-navigation-menu-item-link" href="/"><i class="header-navigation-menu-item-link-icon fa-solid fa-house-chimney"></i>Home</a></li>
                <li class="header-navigation-menu-item"><a class="header-navigation-menu-item-link" href="/about_us"><i class="header-navigation-menu-item-link-icon fa-solid fa-memo-circle-info"></i>About us</a></li>
                <li class="header-navigation-menu-item"><a class="header-navigation-menu-item-link" href="/contact_us"><i class="header-navigation-menu-item-link-icon fa-solid fa-address-book"></i>Contact us</a></li>
                <li class="header-navigation-menu-item"><i class="header-navigation-menu-item-slide__menu-icon fa-solid fa-bars"></i></li>
            </ul>
            <div class="header-navigation-slide__menu">
                <div class="header-navigation-slide__menu-header">
                    <i class="header-navigation-slide__menu-header-close fa-solid fa-x"></i>
                    <a class="header-navigation-slide__menu-header-link" href="/profile"><i class="header-navigation-slide__menu-header-link-icon fa-solid fa-user"></i></a>
                </div>
                <div class="header-navigation-slide__menu-body">
                    <a class="header-navigation-slide__menu-body-link" href="/galleries">Galleries</a>
                    <a class="header-navigation-slide__menu-body-link" href="/games">Games</a>
                </div>
                <div class="header-navigation-slide__menu-footer">
                    <a class="header-navigation-slide__menu-footer-link" href="/login">Login</a>
                    <a class="header-navigation-slide__menu-footer-link" href="/register">Register</a>
                    <a class="header-navigation-slide__menu-footer-link" href="/logout">Logout</a>
                </div>
            </div>
        </nav>
    </header>
@endsection
