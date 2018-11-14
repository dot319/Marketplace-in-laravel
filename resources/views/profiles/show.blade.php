@extends('layouts/app')

@section('content')

<div class="white-box">
    <div id="profile-header" class="line-bottom">
        <div>
            <h2> {{ $user->username }} </h2>
        </div>
        @if ($user->id == $auth)
            <div class="margin-left-auto">
                <a href="/profiles/{{ $user->id }}/edit">
                    <button>
                        <span class="im im-edit"></span>
                         Edit profile
                    </button>
                </a>
            </div>
        @endif 
    </div>
    <div>
        <p> Welcome to {{ $user->username }}'s profile!</p>
    </div>
</div>

<div class="white-box margin-top-20">
    <div class="line-bottom">
        <h4>Ads by {{ $user->username }}</h4>
    </div>
    @if(count($ads) > 0)
        <div id="profile-ad-list">
            @foreach($ads as $ad)
                <a href="/ads/{{ $ad->id }}">
                    <div class="small-text">
                        <p><strong>{{ $ad->title }}</strong></p>
                        <p>{{ $ad->description }}</p>
                        <p>&euro; {{ $ad->price }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @else 
        {{ $user->username }} doesn't have any ads to display.
    @endif
</div>

@endsection