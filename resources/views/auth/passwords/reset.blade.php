@extends('layouts.app')

@section('content')

<div>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <div>
            {{ __('Reset Password')}}
        </div>

        <input type="hidden" name="token" value="{{ $token }}">

        <div>
            <input type="email" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span>{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div>
            <input type="password" placeholder="{{ __('Password') }}" name="password" required>
            @if ($errors->has('password'))
                <span>{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div>
            <input type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required>
        </div>

        <div>
            <button type="submit">{{ __('Reset Password') }}</button>
        </div>

    </form>
</div>

@endsection
