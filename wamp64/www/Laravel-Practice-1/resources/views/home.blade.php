@extends('layouts.app')

@section('content')
    <main class="content">
        <div class="content-text__container">
            <h1 class="content-text__container-title">Welcome to my practice project!</h1>
        </div>
        <div class="content-bg__video__container">
            <video class="content-bg__video__container-video" autoplay muted>
                <source src="/vids/bgvideo.mp4" type="video/mp4"/>
            </video>
        </div>
    </main>
@endsection

