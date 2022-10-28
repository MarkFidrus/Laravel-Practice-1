@section('header')
    <header class="header">
        <nav class="header-navigation">
            <a class="header-navigation-brand" href="/"><i class="header-navigation-brand-icon fa-solid fa-fish"></i><p class="header-navigation-brand-text">Fish site</p></a>

            <a class="header-navigation-menu-item"id="galleriesHeaderBtn" href="/galleries"><i class="header-navigation-menu-item-icon fa-solid fa-image"></i>Galleries</a>
            @if(\Illuminate\Support\Facades\Auth::guest())
                <a class="header-navigation-menu-item" id="loginHeaderBtn" href="/login"><i class="header-navigation-menu-item-icon fa-solid fa-right-to-bracket"></i>Login</a>
                <a class="header-navigation-menu-item" id="registerHeaderBtn" href="/register"><i class="header-navigation-menu-item-icon fa-solid fa-user-plus"></i>Register</a>
            @else<a class="header-navigation-menu-item" id="logoutHeaderBtn" href="/logout"><i class="header-navigation-menu-item-icon fa-solid fa-right-from-bracket"></i>Logout</a>
            @endif
        </nav>
    </header>
@endsection
