@extends('layouts.app')

@section('content')
    <<section class="gallery__container">
        <div class="gallery__container-video__effect"></div>
        <div class="gallery__container-bg__video__container">
            <video class="gallery__container-bg__video__container-video" autoplay muted loop>
                <source src="/vids/bgvideo.mp4" type="video/mp4"/>
            </video>
        </div>
        <div class="gallery__container-content">

        </div>
    </section>
@endsection
