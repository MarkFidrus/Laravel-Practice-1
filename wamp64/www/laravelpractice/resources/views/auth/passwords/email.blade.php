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





@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
