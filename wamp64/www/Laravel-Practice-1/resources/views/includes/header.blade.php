@section('header')
    <header class="header">
        <nav class="header-navigation">
            <a class="header-navigation-brand" href="/"><i class="header-navigation-brand-icon fa-solid fa-fish"></i><p class="header-navigation-brand-text">Fish site</p></a>

            <label class="header-navigation-wrapper" id="sliderHeaderBtn">
                <input class="header-navigation-wrapper-input" type="checkbox" name="remember" id="remember">
                <span class="header-navigation-wrapper-slider">
                    <span class="header-navigation-wrapper-slider-knob"></span>
                    <span class="header-navigation-wrapper-slider-bg__knob"></span>
                </span>
                <i class="header-navigation-wrapper-icon__1 fa-solid fa-sun"></i>
                <i class="header-navigation-wrapper-icon__2 fa-solid fa-moon"></i>
            </label>



            @if(\Illuminate\Support\Facades\Auth::guest())
                <a class="header-navigation-item" id="loginHeaderBtn" href="/login"><i class="header-navigation-item-icon fa-solid fa-right-to-bracket"></i><p class="header-navigation-item-text">Login</p></a>
                <a class="header-navigation-item" id="registerHeaderBtn" href="/register"><i class="header-navigation-item-icon fa-solid fa-user-plus"></i><p class="header-navigation-item-text">Register</p></a>
            @else
                <a class="header-navigation-item" id="galleriesHeaderBtn" href="/galleries"><i class="header-navigation-item-icon fa-solid fa-image"></i><p class="header-navigation-item-text">Galleries</p></a>
                <a class="header-navigation-item" id="gamesHeaderBtn" href="/games"><i class="header-navigation-item-icon fa-solid fa-gamepad"></i><p class="header-navigation-item-text">Games</p></a>
                <a class="header-navigation-item" id="logoutHeaderBtn" href="/logout"><i class="header-navigation-item-icon fa-solid fa-right-from-bracket"></i><p class="header-navigation-item-text">Logout</p></a>
            @endif
        </nav>
    </header>
@endsection
