<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FSWB</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
        <!-- Styles -->
        
    </head>
    <body>
        @include('inc/header')

            @yield('content')

        @include('inc/footer')
        <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/assets/js/jquery-3.2.1.slim.min.js') }}"></script>
        <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
    </body>
</html>
