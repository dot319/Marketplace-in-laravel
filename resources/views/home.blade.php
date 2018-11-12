@extends('layouts/app')

@section('content')
<div>
    <div>
        @if (session('status'))
            <div role="alert">
                {{ session('status') }}
            </div>
        @endif

        You are logged in!
    </div>
</div>
@endsection
