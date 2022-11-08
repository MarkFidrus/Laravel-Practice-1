@section('alert_message')
    @if(Session::has('message_text') && Session::has('message_type'))
        <div class="alert_message_container {{ Session::get('message_type') }}" id="alert_message">
            <p class="alert_message_container-message">{{ Session::get('message_text') }}</p>
        </div>
    @endif
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert_message_container error" id="alert_message">
                <p class="alert_message_container-message">{{ $error }}</p>
            </div>
        @endforeach
    @endif
@endsection
