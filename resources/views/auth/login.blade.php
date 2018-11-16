@extends('layouts.app')

@section('content')

    <div class="perfect-center-parent">
        <div class="perfect-center-child white-bg padding-40 box-shadow rounded-10">
            <form class="form" method="POST" action="{{ route('login') }}">
                @csrf
    
                <div class="form-header line-bottom">
                    Log in
                </div>
    
                <div class="form-input">
                    <input class="text-input" type="email" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span>{{ $errors->first('email') }}</span>
                    @endif
                </div>
    
                <div class="form-input">
                    <input class="text-input" type="password" placeholder="{{ __('Password') }}" name="password" required>
                    @if ($errors->has('password'))
                    <span>{{ $errors->first('password') }}</span>
                    @endif
                </div>
    
                <div class="form-checkbox">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="small-text">
                        {{ __('Remember Me') }}
                    </span>
                </div>
    
                <div class="form-input">
                    <button type="submit">{{ __('Login') }}</button>
                    {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                        &nbsp;&nbsp;&nbsp;{{ __('Forgot Your Password?') }}
                    </a> --}}
                </div>
    

    
            </form>
        </div>
    </div>

    

@endsection
