<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title', config('app.name'))</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Styles -->
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<link href="{{ asset('css/iconmonstr-iconic-font.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=KoHo|Lato" rel="stylesheet">