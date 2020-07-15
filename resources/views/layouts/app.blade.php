<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Attendance Record') }}</title>

        <link href="{{ asset('favicon.ico') }}" rel="icon">
        <link type="text/css" href="{{ asset('css/app.css') }}?v=1.0.0" rel="stylesheet">
        @yield('styles')
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth

        <div class="main-content">
            @include('layouts.navbars.navbar')

            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
        @stack('js')

    </body>
</html>
{{ session()->forget('flash_notification') }}
