<nav>
    <div id="navbar">
        <div class="navbar-item">
            <span >
                <a href="{{ url('/') }}" class="header">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </span>
        </div>

        <div class="small-text navbar-item">
            <a href="/ads">
                Browse ads
            </a>
             | 
            <a href="/ads/create">
                <button id="navbar-ad-button">
                    Place ad
                </button>
            </a>
        </div>

        <div class="small-text navbar-item">

                @guest

                    <span >
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </span>
                     | 
                    <span>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </span>

                @else

                    <span>
                        Welcome, {{ Auth::user()->name }}!
                    </span>
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
    </div>
</nav>