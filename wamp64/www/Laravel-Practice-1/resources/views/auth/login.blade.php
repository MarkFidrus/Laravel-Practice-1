@extends('layouts.app')

@section('content')
<section class="login__container">
    <div class="login__container-bg__video__container">
        <video class="login__container-bg__video__container-video" autoplay muted loop>
            <source src="/vids/bgvideo.mp4" type="video/mp4">
        </video>
    </div>
    <div class="login__container-video__effect"></div>
    <div class="login__container-content">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="login__container-content-header">
                <h1 class="login__container-content-header-title">{{ __('Login') }}</h1>
            </div>
            <div class="login__container-content-body">
                <div class="login__container-content-body-email__field">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label class="login__container-content-body-email__field-label" for="email">{{ __('Email Address') }}</label>
                </div>
                <div class="login__container-content-body-password__field">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                </div>
                <div class="login__container-content-body-other">
                    <div class="login__container-content-body-other-remember__field">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <div class="login__container-content-body-other-password__reset__field">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="login__container-content-footer">
                <div class="login__container-content-footer-btn__field">
                    <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
