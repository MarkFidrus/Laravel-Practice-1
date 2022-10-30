@section('header')
    <header class="header">
        <nav class="header-navigation">
            <a class="header-navigation-brand" href="/"><i class="header-navigation-brand-icon fa-solid fa-fish"></i><p class="header-navigation-brand-text">Fish site</p></a>

            <a class="header-navigation-item" id="galleriesHeaderBtn" href="/galleries"><i class="header-navigation-item-icon fa-solid fa-image"></i><p class="header-navigation-item-text">Galleries</p></a>
            @if(\Illuminate\Support\Facades\Auth::guest())
                <a class="header-navigation-item" id="loginHeaderBtn" href="/login"><i class="header-navigation-item-icon fa-solid fa-right-to-bracket"></i><p class="header-navigation-item-text">Login</p></a>
                <a class="header-navigation-item" id="registerHeaderBtn" href="/register"><i class="header-navigation-item-icon fa-solid fa-user-plus"></i><p class="header-navigation-item-text">Register</p></a>
            @else<a class="header-navigation-item" id="logoutHeaderBtn" href="/logout"><i class="header-navigation-item-icon fa-solid fa-right-from-bracket"></i><p class="header-navigation-item-text">Logout</p></a>
            @endif
        </nav>
    </header>
@endsection
