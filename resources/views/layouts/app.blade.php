<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes/head')
    @yield('head')
</head>
<body>

    @include('includes/navbar')

    <div class="below-navbar" id="below-navbar">
        <div class="narrow" id="narrow">
            @yield('content')           
        </div>   
        @include('includes/footer')
    </div>

    @include('includes/scripts')

</body>
</html>
