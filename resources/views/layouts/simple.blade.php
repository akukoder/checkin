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
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <div class="main-content" id="app">
            @include('partials.navbar')

            @yield('content')

            @guest()
                @include('partials.footers.guest')
            @else
                @include('partials.footers.auth')
            @endguest
        </div>

        <script>
            window.confirm_delete_title = '{{ __('Are you sure?') }}'
            window.confirm_delete_body = "{{ __("You cannot revert this action!") }}"
            window.confirm_delete_btn = '{{ __('Yes, delete it!') }}'
        </script>
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
        @stack('js')
        @include('sweetalert::alert')
    </body>
</html>
{{ session()->forget('flash_notification') }}
