<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link href="{{ asset('img/favicon.png') }}" rel="shortcut icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
    <div id="main" class="text-white bg-dark">
        <main class="py-4">
            <div class="container">
                <p>- úvodní slovo appky
                    - uvítání a popis toho, co je vlastně Krasojízda, jak se k ní chovat a co vyjadřuje ve spojení se
                    svou druhou drahou polovičkou
                    - na Homepage?, jako popup? (spíš ne), samostatná stránka s tlačítkem Pokračovat na Krasojízdu?
                    (spíš ano)</p>
                <a href="{{ url('/') }}">
                    @lang('messages.krasojizda_name')
                </a>
                @include('partials/flash-messages')
            </div>
        </main>

        @include('partials/cookie-bar')

        <script src="{{ asset('js/app.js') }}" defer></script>
        @yield('scripts')
    </div>

    @include('partials/footer')
</body>

</html>
