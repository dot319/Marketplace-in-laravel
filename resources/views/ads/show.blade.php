@extends('layouts/app')

@section('content')
<div id="ad-details" class="white-box">
    <div id="ad-details-header" class="line-bottom">
        <div><h2>{{ $ad->title }}</h2></div>
        <div id="ad-details-user">Placed by: {{ $user }}</div>
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
    </div>

    @endif

</div>

@endsection