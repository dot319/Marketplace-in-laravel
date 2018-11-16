@extends('layouts.app')

@section('content')

<div class="perfect-center-parent">
    <div class="perfect-center-child white-bg padding-40 box-shadow rounded-10">
        <form class="form" method="POST" action="{{ route('password.update') }}">
            @csrf
    
            <div class="form-header line-bottom">
                {{ __('Reset Password')}}
            </div>
    
            <input type="hidden" name="token" value="{{ $token }}">
    
            <div class="form-input">
                <input class="text-input" type="email" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <div class="form-error">{{ $errors->first('email') }}</div>
                @endif
            </div>
    
            <div class="form-input">
                <input class="text-input" type="password" placeholder="{{ __('Password') }}" name="password" required>
                @if ($errors->has('password'))
                    <div class="form-error">{{ $errors->first('password') }}</div>
                @endif
            </div>
    
            <div class="form-input">
                <input class="text-input" type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required>
            </div>
    
            <div class="form-input">
                <button type="submit">{{ __('Reset Password') }}</button>
            </div>
    
        </form>
    </div>
</div>

@endsection
