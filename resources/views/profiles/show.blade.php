@extends('layouts/app')

@section('content')
<div class="white-box">
    <div class="line-bottom margin-bottom-20">
            <h2> {{ $user->name }} </h2>
    </div>
    <div>
        <p> Welcome to {{ $user->name }}'s profile!</p>
    </div>
</div>
@endsection