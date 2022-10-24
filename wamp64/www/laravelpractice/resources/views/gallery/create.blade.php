@extends('layouts/main')

@section('content')
    <div class="off-canvas-content" data-off-canvas-content>
        <div class="title-bar hide-for-large">
            <div class="title-bar-left">
                <button class="menu-icon" type="button" data-toggle="main-menu"></button>
                <span class="title-bar-title">Laravel Practice</span>
            </div>
        </div>
        <div class="callout primary">
            <div class="row column">
                <h1>Create gallery</h1>
                <p class="lead">Create you own gallery.</p>
            </div>
        </div>
        <div class="row small-up-2 medium-up-3 large-up-4">
            <div class="margin">
                {!! Form::open(['action' => '\App\Http\Controllers\GalleryController@store', 'enctype' => 'multipart/form-data']) !!}
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', $value=null, $attributes=['placeholder' => 'Gallery name', 'name' => 'name']) !!}

                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description', $value=null, $attributes=['placeholder' => 'Gallery description', 'name' => 'description']) !!}

                    {!! Form::label('cover_image', 'Cover image') !!}
                    {!! Form::file('cover_image') !!}

                    {!! Form::submit('Create', $attributes=['class' => 'button']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
