@extends('layouts.app')

@section('content')
    <section class="games__container">
        <div class="games__container-video__effect"></div>
        <div class="games__container-bg__video__container">
            <video class="games__container-bg__video__container-video" autoplay muted loop>
                <source src="/vids/bgvideo.mp4" type="video/mp4"/>
            </video>
        </div>
        <div class="games__container-content">

        </div>
    </section>
@endsection
