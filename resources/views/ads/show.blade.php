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

                <div>
                    @foreach ($auth->conversations as $conversation)
                        @if ($conversation->ad_id == $ad->id)
                            @foreach ($conversation->messages as $message)
                                @if ($message->user_id == $auth->id)
                                    <div class="sent-message">
                                        <p class="small-text"><b>You: </b></p>
                                        <p class="small-text">{{ $message->message }}</p>
                                        <p class="very-small-text">{{ $message->created_at }}</p>
                                    </div>
                                @else 
                                    <div class="received-message">
                                        <p class="small-text"><b>Other person: </b></p>
                                        <p class="small-text">{{ $message->message }}</p>
                                        <p class="very-small-text">{{ $message->created_at }}</p>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>

            @endif

        @else 

            You can't reply to your own ad.

        @endif

    @endguest

</div>

@endsection