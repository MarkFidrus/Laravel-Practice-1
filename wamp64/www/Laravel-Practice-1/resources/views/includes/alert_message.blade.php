@section('alert_message')
    @if(Session::has('message_text') && Session::has('message_type'))
        <div class="alert_message_container {{ Session::get('message_type') }}" id="alert_message">
            <p class="alert_message_container-message">{{ Session::get('message_text') }}</p>
        </div>
    @endif
    @error('email')
        <p>{{ $message }}</p>
    @enderror
@endsection
