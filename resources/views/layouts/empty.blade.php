<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes/head')
    @yield('head')
</head>
<body>

    @yield('content')
            
    <script src="{{ asset('js/scripts.js') }}" defer></script>

</body>
</html>