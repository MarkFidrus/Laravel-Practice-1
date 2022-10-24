@extends('layouts/main')

@section('content')
    <div class="off-canvas-content" data-off-canvas-content>
        <div class="title-bar hide-for-large">
            <div class="title-bar-left">
                <button class="menu-icon" type="button" data-toggle="main-menu"></button>
                <span class="title-bar-title">Laravel Practice</span>
            </div>
        </div>
        @if(Session::has('message'))
            <div class="callout success" onClick="$(this).fadeOut()">
                {{ Session::get('message') }}
                <button class="close-button" type="button">&times;</button>
            </div>
        @endif
        <div class="callout primary">
            <div class="row column">
                <a href="/gallery/show/{{$photo->gallery_id}}">Back to gallery...</a>
                <h1>{{$photo->title}}</h1>
                <p class="lead">{{$photo->description}}</p>
                <p class="lead">{{$photo->location}}</p>
            </div>
        </div>
        <div class="row small-up-2 medium-up-3 large-up-4">
            <img class="image" src="/photos/{{$photo->gallery_id}}/{{$photo->image}}">
        </div>
    </div>
@stop
