@extends('layouts/app')

@section('content')
<div class="white-box">
    <div id="profile-header" class="line-bottom">
        <div>
            <h2> {{ $user->name }} </h2>
        </div>
        <div class="margin-left-auto">
            <button>
                <span class="im im-edit"></span>
                 Edit
            </button>
        </div>
    </div>
    <div>
        <p> Welcome to {{ $user->name }}'s profile!</p>
    </div>
</div>

<div class="white-box margin-top-20">
    <div class="line-bottom">
        <h4>Ads by {{ $user->name }}</h4>
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
        {{ $user->name }} doesn't have any ads to display.
    @endif
</div>
@endsection