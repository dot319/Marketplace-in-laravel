@extends('layouts/empty')

@section('content')

    <div id="landing-page-user-box">

        @guest
            <a href="{{ route('login') }}">{{ __('Login') }}</a> | 
            @if (Route::has('register'))
                <a href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span>Welcome, {{ Auth::user()->username }}! | </span>
            <a href="/home">
                <span class="im im-home"></span>
            </a> | 
            <span>
                <a href="{{ route('logout') }}" 
                    oncspanck="event.preventDefault();
                    document.getElementById('logout-form').submit();"> 
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </span>
        @endguest
    </div>

    <div class="perfect-center-parent">
        <div id="landing-page" class="perfect-center-child center-parent">

            <div id="landing-page-header" >
                <h1 class="header">{{ config('app.name') }}</h1>
            </div>

            <div>
                <form>
                    <input placeholder="Search for shoes, wardrobes, concert tickets, iPhones..." id="landing-page-search-bar" type="text">
                    <a href="/ads">
                        <button class="round-60 perfect-center-inline-flex-parent">
                            <span class="im im-magnifier"></span>
                        </button>
                    </a>
                </form>
            </div>

            <div>
                <a href="/ads/create">
                    <button id="landing-page-ad-button" class="box-shadow">
                        Place ad
                    </button>
                </a>
            </div>

        </div>
    </div>

@endsection