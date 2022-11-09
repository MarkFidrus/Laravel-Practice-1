@extends('layouts.app')

@section('content')
    <section class="profile__container">
        <div class="profile__container-content">
            @if(($profileData->visibility === 'private' || $profileData->visibility === 'friends' || $profileData->is_sanctioned === 1) && $profileData->id !== Auth::id())
                <div class="profile__container-content-header">
                    <div class="profile__container-content-header-cover__image__container">
                        <img class="profile__container-content-header-cover__image__container-image" src="{{ asset('images/profiles/coverImages/' . $profileData->cover_image) }}" alt="profile's cover image">
                    </div>
                    <div class="profile__container-content-header-content">
                        <img class="profile__container-content-header-content-profile__picture" src="{{ asset('images/profiles/' . $profileData->profile_picture) }}" alt="profile picture">
                        <h1 class="profile__container-content-header-content-username">{{ $profileData->name }}</h1>
                        <p class="profile__container-content-header-content-introduction">{{ $profileData->introduction }}</p>
                    </div>
                </div>
                <div class="profile__container-content-header-content-non__visibility__container">
                    @if($profileData->is_sanctioned === 1)
                        <p class="profile__container-content-header-content-non__visibility__container-text">{{ __('User has been sanctioned!') }}</p>
                    @elseif($profileData->visibility === 'private')
                        <p class="profile__container-content-header-content-non__visibility__container-text">{{ __("User's profile is private!") }}</p>
                    @elseif($profileData->visibility === 'friends')
                        <p class="profile__container-content-header-content-non__visibility__container-text">{{ __("Only user's friends can check this profile!") }}</p>
                    @endif
                </div>
            @else
                @if(Auth::id() !== $profileData->id)
                    <div class="profile__container-content-header">
                        <div class="profile__container-content-header-cover__image__container">
                            <img class="profile__container-content-header-cover__image__container-image" src="{{ asset('images/profiles/coverImages/' . $profileData->cover_image) }}" alt="profile's cover image">
                        </div>
                        <div class="profile__container-content-header-content">
                            <img class="profile__container-content-header-content-profile__picture" src="{{ asset('images/profiles/' . $profileData->profile_picture) }}" alt="profile picture">
                            <h1 class="profile__container-content-header-content-username">{{ $profileData->name }}</h1>
                            <p class="profile__container-content-header-content-introduction">{{ $profileData->introduction }}</p>
                            <a class="profile__container-content-header-content-edit__link" href="/profile/edit/{{ $profileData->id }}"><i class="profile__container-content-header-content-edit__link-icon fa-solid fa-pencil"></i></a>
                        </div>
                    </div>
                    <div class="profile__container-content-body">
                        <div class="profile__container-content-body-friends">
                            <h2>{{ __('Friends') }}</h2>
                            <div>

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
                @else
                    <div class="profile__container-content-header">
                        <div class="profile__container-content-header-cover__image__container">
                            <img class="profile__container-content-header-cover__image__container-image" src="{{ asset('images/profiles/coverImages/' . $profileData->cover_image) }}" alt="profile's cover image">
                        </div>
                        <div class="profile__container-content-header-content">
                            <img class="profile__container-content-header-content-profile__picture" src="{{ asset('images/profiles/' . $profileData->profile_picture) }}" alt="profile picture">
                            <h1 class="profile__container-content-header-content-username">{{ $profileData->name }}</h1>
                            <p class="profile__container-content-header-content-introduction">{{ $profileData->introduction }}</p>
                            <a class="profile__container-content-header-content-edit__link" href="/profile/edit/{{ $profileData->id }}"><i class="profile__container-content-header-content-edit__link-icon fa-solid fa-pencil"></i></a>
                        </div>
                    </div>
                    <div class="profile__container-content-body">
                        <div class="profile__container-content-body-friends">
                            <h2>{{ __('Friends') }}</h2>
                            <div>

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
            @endif

        </div>
    </section>
@endsection
