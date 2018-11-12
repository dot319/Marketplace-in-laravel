@extends('layouts.app')

@section('content')

    <div class="perfect-center-parent">
        <div class="perfect-center-child white-bg padding-40 box-shadow rounded-10">
            <form class="form" method="POST" action="{{ route('register') }}">
                @csrf
    
                <div class="form-header line-bottom">
                    <h2 class="header">{{ __('Register') }}</h2>
                </div>
    
                <div class="form-input">
                    <input type="text" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <div class="form-error">{{ $errors->first('name') }}</div>
                    @endif
                </div>
    
                <div class="form-input">
                    <input type="email" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <div class="form-error">{{ $errors->first('email') }}</div>
                    @endif
                </div>
    
                <div class="form-input">
                    <input type="password" placeholder="{{ __('Password') }}" name="password" required>
                    @if ($errors->has('password'))
                        <div class="form-error">{{ $errors->first('password') }}</div>
                    @endif
                </div>
    
                <div class="form-input">
                    <input type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required>
                </div>
    
                <div class="form-input">
                    <button type="submit">{{ __('Register') }}</button>
    
                </div>
    
            </form>
        </div>        
    </div>

@endsection
