<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link href="{{ asset('img/favicon.png') }}" rel="shortcut icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker-bs4.min.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
    <div id="main" class="text-white bg-dark">
        @auth
        @include('partials/navbar')
        @endauth

        @include('partials/flash-messages')

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>

        @include('partials/footer')

        @include('partials/cookie-bar')

        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ asset('js/datepicker.min.js') }}" defer></script>
        {{-- <script src="{{ asset('js/datepicker-full.min.js') }}"></script> --}}
        <script src="{{ asset('js/datepicker-locales/cs.js') }}" defer></script>
        @yield('scripts')
    </div>
</body>

</html>