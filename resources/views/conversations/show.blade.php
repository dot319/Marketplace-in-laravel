@extends('layouts/app')

@section('content')
<div class="white-box">
    <div class="line-bottom center-parent">
        @foreach ($conversation->users as $user)
            @if ($user->id != Auth::id())
                Conversation with {{ $user->username }}
            @endif
        @endforeach
    </div>
    @include('includes/recurring-elements/conversation');
</div>
    
@endsection