@extends('layouts/app')

@section('content')
<div id="ad-details" class="white-box">
    <div id="ad-details-header" class="line-bottom">
        <div><h2>{{ $ad->title }}</h2></div>
        <div id="ad-details-user">Placed by: 
            <a href="/profiles/{{ $ad->user_id }}">
                {{ $user }}
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

</div>

@endsection