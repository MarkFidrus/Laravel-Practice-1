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
                <a href="/">Back to galleries...</a>
                <h1>{{$gallery->name}}</h1>
                <p class="lead">{{$gallery->description}}</p>
                <?php
                if (!Auth::guest())
                {
                ?>
                <a class="button" href="/photo/create/{{$gallery->id}}">Upload photo</a>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="row small-up-2 medium-up-3 large-up-4">
            <?php
            foreach ($photos as $photo)
            {
            ?>
            <div class="column">
                <a href="/photo/details/{{$photo->id}}"><img class="thumbnail" src="/photos/{{$gallery->id}}/<?php echo $photo->image; ?>"></a>
                <h5>{{ $photo->title }}</h5>
                <p>{{ $photo->description }}</p>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
@stop
