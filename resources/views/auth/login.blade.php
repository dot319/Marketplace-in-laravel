@extends('layouts.app')

@section('content')

    <div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                Log in
            </div>

            <div>
                <input type="email" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autofocus>
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
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div>
                <button type="submit">{{ __('Login') }}</button>
            </div>

            <div>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </div>

        </form>
    </div>

@endsection
