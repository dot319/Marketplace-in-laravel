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
    <div class="flexbox">
        <div>
            @if ($user->first_name || $user->last_name)
                <p><span class="im im-id-card"></span> &nbsp;&nbsp; {{ $user->first_name . " " . $user->last_name }}</p>
            @endif
            @if ($user->city && $user->country)
            <p><span class="im im-location"></span> &nbsp;&nbsp; {{ $user->city . ", " . $user->country }}</p>
            @elseif ($user->city || $user->country)
            <p><span class="im im-location"></span> &nbsp;&nbsp; {{ $user->city . $user->country }}</p>
            @endif
            <p>Total number of ads placed: {{ count($ads) }}</p>
            <p>Member since: {{ $member_for }}</p>
        </div>
        <div class="margin-left-auto">
            @if ($user->pic_url)
            <img class="profile-pic" src="{{ $user->pic_url }}" alt="{{ $user->username }}'s profile picture">
            @else
            <img class="profile-pic" src="https://image.ibb.co/mTNBZf/default-profile-pic.png" alt="{{ $user->username }}'s profile picture">
            @endif
        </div>
    </div>
    @if ($user->bio)
    <div class="light-bg margin-20 padding-40">
        <p>{{ $user->bio }}</p>
    </div>
    @endif
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