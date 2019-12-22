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
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <h2>Vítej v Krasojízdě</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>- úvodní slovo appky
                            - uvítání a popis toho, co je vlastně Krasojízda, jak se k ní chovat a co vyjadřuje ve
                            spojení se
                            svou druhou drahou polovičkou
                            - na Homepage?, jako popup? (spíš ne), samostatná stránka s tlačítkem Pokračovat na
                            Krasojízdu?
                            (spíš ano)</p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <a href="{{ url('/') }}" class="proceed-link">
                            @lang('messages.welcome_proceed_link')
                        </a>
                    </div>
                </div>

                @include('partials/flash-messages')
            </div>
        </main>

        @include('partials/footer')

        @include('partials/cookie-bar')

        <script src="{{ asset('js/app.js') }}" defer></script>
        @yield('scripts')
    </div>
</body>

</html>