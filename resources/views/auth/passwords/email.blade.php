@extends('layouts.app')

@section('content')

    <div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div>
                {{ __('Reset Password')}}
            </div>

            @if (session('status'))
                <div>
                    {{ session('status') }}
                </div>
            @endif

            <div>
                <input type="email" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span>{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div>
                <button type="submit">{{ __('Send Password Reset Link') }}</button>
            </div>

        </form>
    </div>

@endsection
