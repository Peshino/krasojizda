<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@lang('messages.krasojizda_name')</title>

        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <link href="{{ asset('img/favicon.png') }}" rel="shortcut icon">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('styles')
    </head>

    <body>
        <div id="introduction">
            <div class="introduction-header">
                <h1>@lang('messages.krasojizda_name')</h1>
                <h2>@lang('messages.krasojizda_description')</h2>
            </div>

            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ count($errors) > 0 && Session::get('last_auth_attempt') === 'register' ? '' : 'active' }}" data-toggle="tab" href="#sign-in">@lang('messages.sign_in_tab')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ count($errors) > 0 && Session::get('last_auth_attempt') === 'register' ? 'active' : '' }}" data-toggle="tab" href="#sign-up">@lang('messages.sign_up_tab')</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="sign-in" class="tab-pane {{ count($errors) > 0 && Session::get('last_auth_attempt') === 'register' ? '' : 'active' }}"><br>
                            @include('auth.login')
                        </div>

                        <div id="sign-up" class="tab-pane fade {{ count($errors) > 0 && Session::get('last_auth_attempt') === 'register' ? 'active show' : '' }}"><br>
                            @include('auth.register')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('partials/footer')

        @include('partials/cookie-bar')

        <script src="{{ asset('js/app.js') }}" defer></script>
        @yield('scripts')
    </body>
</html>
