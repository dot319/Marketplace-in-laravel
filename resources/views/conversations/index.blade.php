@extends('layouts/app')

@section('content')
<div class="white-box">
    <div class="line-bottom center-parent">
        Users you are having conversations with
    </div>
    <div>
        @foreach($conversations as $conversation)
                @foreach ($conversation->users as $user)
                        @if ($user->id == Auth::id())
                            @foreach ($conversation->users as $newUser)
                                @if ($newUser->id != Auth::id())
                                <a href="/conversations/{{ $conversation->id }}">
                                    <p>{{ $newUser->username }}</p>
                                </a>
                                @endif
                            @endforeach

                        @endif

                @endforeach

        @endforeach
    </div>
</div>
@endsection