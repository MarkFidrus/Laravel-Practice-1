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
                <h1>Upload photo</h1>
                <p class="lead">Upload photo to gallery...</p>
            </div>
        </div>
        <div class="row small-up-2 medium-up-3 large-up-4">
            <div class="margin">
                {!! Form::open(['action' => '\App\Http\Controllers\PhotoController@store', 'enctype' => 'multipart/form-data']) !!}
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', $value=null, $attributes=['placeholder' => 'Photo title', 'name' => 'title']) !!}

                {!! Form::label('description', 'Description') !!}
                {!! Form::text('description', $value=null, $attributes=['placeholder' => 'Photo description', 'name' => 'description']) !!}

                {!! Form::label('location', 'Location') !!}
                {!! Form::text('location', $value=null, $attributes=['placeholder' => 'Photo location', 'name' => 'location']) !!}

                {!! Form::label('image', 'Image') !!}
                {!! Form::file('image') !!}

                <input type="hidden" name="gallery_id" value="{{$gallery_id}}">

                {!! Form::submit('Upload', $attributes=['class' => 'button']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
