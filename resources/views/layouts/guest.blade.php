<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ setting('site-name', config('app.name')) }}</title>

        <link href="{{ asset('favicon.ico') }}" rel="icon">
        <link type="text/css" href="{{ asset('css/app.css') }}?v=1.0.0" rel="stylesheet">
        @yield('styles')
    </head>
    <body class="{{ $class ?? '' }}">

        <div class="main-content" id="app">
            @yield('content')
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
        @stack('js')
        @include('sweetalert::alert')
    </body>
</html>
{{ session()->forget('flash_notification') }}
