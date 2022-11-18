@extends('layouts.app')

@section('showProfileHeader')
    <div class="profile__container-content-header">
        <div class="profile__container-content-header-cover__image__container">
            <img class="profile__container-content-header-cover__image__container-image" src="{{ asset('images/profiles/coverImages/'. $profileData->cover_image) }}" alt="profile's cover image">
        </div>
        <div class="profile__container-content-header-content">
            <img class="profile__container-content-header-content-profile__picture" src="{{ asset('images/profiles/'. $profileData->profile_picture) }}" alt="profile picture">
            <h1 class="profile__container-content-header-content-username">{{ $profileData->name }}</h1>
            <p class="profile__container-content-header-content-introduction">{{ $profileData->introduction }}</p>
            <form method="POST">
                <input type="hidden" name="userId" value="{{$profileData->id}}">
                @csrf
                @if(!$is_friend)
                    @if(!$is_friend_request_sent)
                        <div class="profile__container-content-header-content-form">
                            <div class="profile__container-content-header-content-form-label">
                                <label class="profile__container-content-header-content-form-label-text">Add Friend</label>
                            </div>
                            <button class="profile__container-content-header-content-form-btn" type="submit" name="sendFriendRequest"><i class="profile__container-content-header-content-form-icon fa-solid fa-plus"></i></button>
                        </div>
                    @else
                        <div>
                            <div class="profile__container-content-header-content-form-label">
                                <label class="profile__container-content-header-content-form-label-text">Remove friend request</label>
                            </div>
                            <button class="profile__container-content-header-content-form-btn" type="submit" name="removeFriendRequest"><i class="profile__container-content-header-content-form-icon fa-solid fa-xmark"></i></button>
                        </div>
                    @endif
                @else
                    <div>
                        <div class="profile__container-content-header-content-form-label">
                            <label class="profile__container-content-header-content-form-label-text">Remove Friend</label>
                        </div>
                        <button class="profile__container-content-header-content-form-btn" type="submit" name="removeFriend"><i class="profile__container-content-header-content-form-icon fa-solid fa-xmark"></i></button>
                    </div>
                @endif
            </form>
            <div class="profile__container-content-header-content-location">
                <p class="profile__container-content-header-content-location-text">{{ __('Location: ') }}</p>
                <p class="profile__container-content-header-content-location-profile__location">{{ $location }}</p>
            </div>
        </div>
    </div>
@endsection

@section('showProfileBody')
    <div class="profile__container-content-body">
        <div class="profile__container-content-body-friends__container">
            <h2 class="profile__container-content-body-friends__container-title">{{ __('Friends') }}</h2>
            <div class="profile__container-content-body-friends__container-friends">
                @foreach($friends as $friend)
                    <div class="profile__container-content-body-friends__container-friends-friend">
                        <a class="profile__container-content-body-friends__container-friends-friend-link" href="/profile/{{ $friend->id }}">
                            <img class="profile__container-content-body-friends__container-friends-friend-link-profile__picture" src="{{ asset('images/profiles/'.$friend->profile_picture.'') }}">
                            <p class="profile__container-content-body-friends__container-friends-friend-link-username">{{ $friend->name }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="profile__container-content-body-galleries">
            <h2>{{ __('Galleries') }}</h2>
            <div>

            </div>
        </div>
        <div class="profile__container-content-body-photos">
            <h2>{{ __('Uploaded photos') }}</h2>
            <div>

            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="profile__container">
        <div class="profile__container-content toTop">
            @if($profileData->id !== Auth::user()->id)
                @if($profileData->is_sanctioned === 1)
                    <div class="profile__container-content-header-content-non__visibility__container">
                        <p class="profile__container-content-header-content-non__visibility__container-text">{{ __("User is sanctioned!") }}</p>
                    </div>
                    @yield('showProfileHeader')
                @elseif($profileData->is_sanctioned === 0)
                    @if($profileData->visibility === 'private')
                        <div class="profile__container-content-header-content-non__visibility__container">
                            <p class="profile__container-content-header-content-non__visibility__container-text">{{ __("User's profile is private!") }}</p>
                        </div>
                        @yield('showProfileHeader')
                    @elseif($profileData->visibility === 'friends' || $profileData->visibility === 'public')
                        @if($profileData->visibility === 'friends' && $is_friend === false)
                            <div class="profile__container-content-header-content-non__visibility__container">
                                <p class="profile__container-content-header-content-non__visibility__container-text">{{ __("Only user's friends can check the profile! ") }}<form method="POST">
                                    @csrf
                                    <input type="hidden" name="userId" value="{{$profileData->id}}">
                                    <input type="submit" name="sendFriendRequest" value="Send friend request to {{ $profileData->name }}">
                                </form></p>
                            </div>
                            @yield('showProfileHeader')
                        @elseif($profileData->visibility === 'friends' && $is_friend === true)
                            @yield('showProfileHeader')
                            @yield('showProfileBody')
                        @elseif($profileData->visibility === 'public')
                            @yield('showProfileHeader')
                            @yield('showProfileBody')
                        @endif
                    @endif
                @endif
            @elseif($profileData->id === Auth::user()->id)
                <div class="profile__container-content-header">
                    <div class="profile__container-content-header-cover__image__container">
                        <img class="profile__container-content-header-cover__image__container-image" src="{{ asset('images/profiles/coverImages/' . $profileData->cover_image) }}" alt="profile's cover image">
                    </div>
                    <div class="profile__container-content-header-content">
                        <img class="profile__container-content-header-content-profile__picture" src="{{ asset('images/profiles/' . $profileData->profile_picture) }}" alt="profile picture">
                        <h1 class="profile__container-content-header-content-username">{{ $profileData->name }}</h1>
                        <p class="profile__container-content-header-content-introduction">{{ $profileData->introduction }}</p>
                        <a class="profile__container-content-header-content-edit__link" href="/profile/edit/{{ $profileData->id }}"><i class="profile__container-content-header-content-edit__link-icon fa-solid fa-user-pen"></i></a>
                        <a class="profile__container-content-header-content-friend__request" href="#friendRequests"><i class="profile__container-content-header-content-friend__request-icon fa-solid fa-person-circle-plus"></i></a>
                        <div class="profile__container-content-header-content-location">
                            <p class="profile__container-content-header-content-location-text">{{ __('Location: ') }}</p>
                            <p class="profile__container-content-header-content-location-profile__location">{{ $location }}</p>
                        </div>
                    </div>
                </div>
                <div class="profile__container-content-body">
                    <div class="profile__container-content-body-friends__container">
                        <h2 class="profile__container-content-body-friends__container-title">{{ __('Friends') }}</h2>
                        <div class="profile__container-content-body-friends__container-friends">
                            @foreach($friends as $friend)
                                <div class="profile__container-content-body-friends__container-friends-friend">
                                    <a class="profile__container-content-body-friends__container-friends-friend-link" href="/profile/{{ $friend->id }}">
                                        <img class="profile__container-content-body-friends__container-friends-friend-link-profile__picture" src="{{ asset('images/profiles/'.$friend->profile_picture.'') }}">
                                        <p class="profile__container-content-body-friends__container-friends-friend-link-username">{{ $friend->name }}</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="profile__container-content-body-friends__requests__container" id="friendRequests">
                        <h2 class="profile__container-content-body-friends__requests__container-title">{{ __('Friend requests') }}</h2>
                        <div class="profile__container-content-body-friends__requests__container-requests">
                        @foreach($friendRequests as $friendRequest)
                            <div class="profile__container-content-body-friends__requests__container-requests-request">
                                <div class="profile__container-content-body-friends__requests__container-requests-request-content">
                                    <img class="profile__container-content-body-friends__requests__container-requests-request-content-profile__image" src="{{asset('images/profiles/'.$friendRequest->profile_picture)}}">
                                    <a class="profile__container-content-body-friends__requests__container-requests-request-content-username" href="/profile/{{$friendRequest->id}}">{{$friendRequest->name}}</a>
                                    <form class="profile__container-content-body-friends__requests__container-requests-request-content-form" method="POST">
                                        @csrf
                                        <input type="hidden" name="userId" value="{{$friendRequest->id}}">
                                        <button type="submit" name="acceptFriendRequest" class="profile__container-content-body-friends__requests__container-requests-request-content-form-accept"><i class="profile__container-content-body-friends__requests__container-requests-request-content-form-accept-icon fa-solid fa-check"></i></button>
                                        <button type="submit" name="declineFriendRequest" class="profile__container-content-body-friends__requests__container-requests-request-content-form-decline"><i class="profile__container-content-body-friends__requests__container-requests-request-content-form-decline-icon fa-solid fa-xmark"></i></button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="profile__container-content-body-galleries">
                        <h2>{{ __('Galleries') }}</h2>
                        <div>

                        </div>
                    </div>
                    <div class="profile__container-content-body-photos">
                        <h2>{{ __('Uploaded photos') }}</h2>
                        <div>

                        </div>
                    </div>
                </div>
            @endif
    </section>
@endsection
