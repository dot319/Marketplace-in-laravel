@extends('layouts/app')

@section('content')
<div id="ad-details" class="white-box">
    <div id="ad-details-header" class="line-bottom">
        <div><h2>{{ $ad->title }}</h2></div>
        <div id="ad-details-user">Placed by: 
            <a href="/profiles/{{ $ad->user_id }}">
                {{ $ad->user->username }}
            </a>
        </div>
    </div>
    <div id="ad-details-description">
        {{ $ad->description }}
    </div>
    <div id="ad-details-price">
        &euro; {{ $ad->price }}
    </div>

    
    @if ($ad->user_id == $auth)
        <div class="margin-top-20">
            <a href="/ads/{{ $ad->id }}/edit">
                <button><span class="im im-edit"></span> Edit</button>
            </a>
            <form class="inline margin-left-20" action="/ads/{{ $ad->id }}" method="POST">
                @csrf 
                @method('delete')
                <button class="red-button" type="submit">
                    <span class="im im-x-mark-circle"></span>
                    Delete
                </button>
            </form>
        </div>
    @endif

    <div class="line-bottom margin-top-20"></div>

    @guest
        <div>You must be logged in to reply to ads. <a href="/login">Log in</a>.</div>
    @else
        @if ($auth != $ad->user_id)
            <div id="ad-details-send-message">
                <form class="form">
                    <div class="form-header">
                        Send a message to {{ $ad->user->username }} about this ad
                    </div>
                    <div class="form-input">
                        <textarea class="text-input textarea"></textarea>
                    </div>
                    <div>
                        <button type="submit">
                            <span class="im im-mail"></span>
                            &nbsp; Send
                        </button>
                    </div>
                </form>
            </div>
        @else 
            You can't reply to your own ad.
        @endif
    @endguest

</div>

@endsection