<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('assets/frontend/plugins/slick/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/plugins/slick/slick/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
<div id="app">
  @include('frontend._includes.header')
  @yield('content')
  @include('frontend._includes.footer')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('assets/frontend/plugins/slick/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/frontend/main.js') }}"></script>
</body>
</html>
