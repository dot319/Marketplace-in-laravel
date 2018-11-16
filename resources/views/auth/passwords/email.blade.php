@extends('layouts.app')

@section('content')

<div class="perfect-center-parent">
        <div class="perfect-center-child white-bg padding-40 box-shadow rounded-10">
            <form class="form" method="POST" action="{{ route('password.email') }}">
                @csrf
    
                <div class="form-header line-bottom">
                    {{ __('Reset Password')}}
                </div>
    
                @if (session('status'))
                    <div>
                        {{ session('status') }}
                    </div>
                @endif
    
                <div class="form-input">
                    <input class="text-input" type="email" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <div class="form-error">{{ $errors->first('email') }}</div>
                    @endif
                </div>
    
                <div class="form-input">
                    <button type="submit">{{ __('Send Password Reset Link') }}</button>
                </div>
    
            </form>
    </div>
</div>


@endsection
