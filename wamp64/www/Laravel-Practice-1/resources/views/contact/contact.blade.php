@extends('layouts.app')

@section('content')
    <section class="contact__container">
        <div class="contact__container-video__effect"></div>
        <div class="contact__container-bg__video__container">
            <video class="contact__container-bg__video__container-video" autoplay muted loop>
                <source src="/vids/bgvideo.mp4" type="video/mp4"/>
            </video>
        </div>
        <div class="contact__container-content">
            <div class="contact__container-content-fields">
                <div class="contact__container-content-fields-header">
                    <h1 class="contact__container-content-fields-header-title">{{__('Contact us')}}</h1>
                </div>
                <div class="contact__container-content-fields-body">
                    <div class="contact__container-content-fields-body-name__field">
                        <input id="name" type="text" class="content__container-content-body-name__field-input" name="name" required placeholder="Name">
                        <i class="content__container-content-body-name__field-icon fa-solid fa-user"></i>
                        <label for="name" class="content__container-content-body-name__field-label">{{ __('Name') }}</label>
                    </div>
                    <div class="contact__container-content-fields-body-email__field">
                        <input id="email" type="email" class="content__container-content-body-email__field-input" name="email" required placeholder="Email address">
                        <i class="content__container-content-body-email__field-icon fa-solid fa-envelope"></i>
                        <label for="email" class="content__container-content-body-email__field-label">{{ __('Email address') }}</label>
                    </div>
                    <div class="contact__container-content-fields-body-title__field">
                        <input id="title" type="text" class="contact__container-content-body-title__field-input" name="title" required placeholder="Title">
                        <i class="contact__container-content-body-title__field-icon fa-solid fa-envelope"></i>
                        <label for="title" class="contact__container-content-body-title__field-label">{{ __('Title') }}</label>
                    </div>
                    <div class="contact__container-content-fields-body-message__field">
                        <textarea id="message" class="contact__container-content-body-name__field-input" name="name" required placeholder="Message"></textarea>
                        <label for="message" class="contact__container-content-body-name__field-label">{{ __('Name') }}</label>
                    </div>
                </div>
                <div class="contact__container-content-fields-footer">
                    <div class="contact__container-content-fields-footer-btn__field">
                        <button type="submit" class="contact__container-content-footer-btn__field-btn">{{ __('Send message') }}</button>
                    </div>
                </div>
            </div>
            <div class="content__container-content-comment">

            </div>
        </div>
    </section>
@endsection
