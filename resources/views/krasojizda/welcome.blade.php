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
                <div class="row mt-3">
                    <div class="col">
                        <img src="{{ asset('img/logo_small.png') }}" class="align-middle" alt="logo">
                    </div>
                </div>
                <div class="row mt-4 mb-4">
                    <div class="col">
                        <p class="p-1">
                            Ahoj, jsi na místě sloužícím tobě a tvé drahé druhé polovičce, se kterou tvoříš Vaši
                            Krasojízdu.
                        </p>
                        <p class="p-1">
                            Krasojízdou je myšlen Váš vztah, na kterém je potřeba neustále pracovat, udržovat vzájemnou
                            komunikaci a připomínat si důležité dny a zážitky společně s tvorbou nových.
                        </p>
                        <p class="p-1">
                            Pokračuj tedy dále na Vaší společné cestě životem a bav se :)
                        </p>
                    </div>
                </div>
                <div class="row">
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