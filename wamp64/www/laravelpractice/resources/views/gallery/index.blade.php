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
                <h1>Galleries</h1>
                <p class="lead">You can check galleries and there photos, but if you would like to create an own gallery with your photos you can create you own.</p>
            </div>
        </div>
        <div class="row small-up-2 medium-up-3 large-up-4">
            <?php
            foreach ($galleries as $gallery)
            {
            ?>
                <div class="column">
                    <a href="/gallery/show/{{$gallery->id}}"><img class="thumbnail" src="coverImages/<?php echo $gallery->cover_image; ?>"></a>
                    <h5>{{ $gallery->name }}</h5>
                    <p>{{ $gallery->description }}</p>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
@stop
