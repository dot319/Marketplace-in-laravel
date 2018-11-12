@extends('layouts/empty')

@section('content')

    <div id="landing-page-background" class="perfect-center-parent">
        <div id="landing-page" class="perfect-center-child center-parent">

            <div id="landing-page-header" >
                <h1 class="header">{{ config('app.name') }}</h1>
            </div>

            <div>
                <form>
                    <input placeholder="Search for shoes, wardrobes, concert tickets, iPhones..." id="landing-page-search-bar" type="text">
                    <button class="round-60 perfect-center-inline-flex-parent"><span class="im im-magnifier"></span></button>
                </form>
            </div>

            <div>
                <button id="landing-page-ad-button" class="box-shadow">Place ad</button>
            </div>

            <div>
                <a href="{{ route('login') }}">{{ __('Login') }}</a> | 
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            </div>


        </div>
    </div>

@endsection