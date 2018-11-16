<div class="message-container">
    @foreach ($conversation->messages as $message)
        @if ($message->user_id == Auth::id())
            <div class="sent-message message">
                <p class="small-text"><b>You: </b></p>
                <p class="small-text">{{ $message->message }}</p>
                <p class="very-small-text grey-text">{{ $message->created_at }}</p>
            </div>
        @else 
            <div class="received-message message">
                <p class="small-text"><b>Other person: </b></p>
                <p class="small-text">{{ $message->message }}</p>
                <p class="very-small-text grey-text">{{ $message->created_at }}</p>
            </div>
        @endif
    @endforeach
</div>

<div id="reply-form-container">
    <form id="reply-form" method="POST" action="/conversations/{{ $conversation->id }}">
        @csrf
        @method('patch')

        <div class="form-input">
            <textarea class="text-input reply-textarea" name="message" placeholder="Send a message" required></textarea>
        </div>

        <div>
            <button type="submit">
                <span class="im im-mail"></span>
                &nbsp; Send
            </button>
        </div>

    </form>
</div>