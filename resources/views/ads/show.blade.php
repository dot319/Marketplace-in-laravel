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

    
    @if ($ad->user_id == $auth->id)
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

        @if ($ad->user_id != $auth->id)

            @if (count($auth->conversations->where('ad_id', $ad->id)) == 0)


                <div id="ad-details-send-message">
                    <form method="POST" action="/conversations" class="form">
                        @csrf

                        <div class="form-header">
                            Send a message to {{ $ad->user->username }} about this ad
                        </div>

                        <div class="form-input">
                            <textarea class="text-input textarea" name="message"></textarea>
                        </div>

                        <div>
                            <input type="hidden" name="ad_id" value="{{ $ad->id }}">
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
                <div>Message history</div>
                
                    @foreach ($auth->conversations as $conversation)
                        @if ($conversation->ad_id == $ad->id)
                            @include('includes/recurring-elements/conversation')
                        @endif
                    @endforeach
                </div>

            @endif

        @else 

            @if (count($auth->conversations->where('ad_id', $ad->id)) > 0)
                <div>
                    <p>You have conversations about this ad with these users:</p>
                </div>
                @foreach ($auth->conversations as $conversation)
                    @if ($conversation->ad_id == $ad->id)
                        @foreach ($conversation->users as $user)
                            @if ($user->id != $auth->id)

                                @if (request('conv') == $user->id )
                                    <p>
                                        <a href="/profiles/{{ $user->id }}">
                                            {{ $user->username }} &nbsp;
                                        </a> 
                                        <a href="/ads/{{ $ad->id }}">
                                            <span class="small-text">Collapse conversation</span>
                                        </a> 
                                    </p>
                                    @include('includes/recurring-elements/conversation')
                                @else
                                    <p>
                                        <a href="/profiles/{{ $user->id }}">
                                            {{ $user->username }} &nbsp;
                                        </a> 
                                        <a href="/ads/{{ $ad->id }}?conv={{ $user->id }}">
                                            <span class="small-text">View conversation</span>
                                        </a> 
                                    </p>
                                @endif

                            @endif
                        @endforeach
                    @endif
                @endforeach

            @endif

        @endif

    @endguest

</div>

@endsection