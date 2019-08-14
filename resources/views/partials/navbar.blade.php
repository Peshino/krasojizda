<nav class="navbar navbar-expand-md navbar-icon-top navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/logo_small_navbar.png') }}" class="align-middle" alt="logo">
            <span class="align-middle">@lang('messages.krasojizda_name')</span>
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="@lang('messages.toggle_navigation')">
            <span class="icon-bar top-bar"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-map-marker-alt align-middle"></i>&nbsp;
                        <span class="align-middle">@lang('messages.our_places')</a></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-heart align-middle"></i>&nbsp;
                        <span class="align-middle">@lang('messages.life_events')</a></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('important-days.index') }}"><i
                            class="far fa-calendar-alt align-middle"></i>&nbsp;
                        <span class="align-middle">@lang('messages.important_days')</a></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-comments align-middle"></i>&nbsp;
                        <span class="align-middle">@lang('messages.conversations')</a></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.index') }}"><i
                            class="fas fa-pencil-alt align-middle"></i>&nbsp;
                        <span class="align-middle">@lang('messages.blog')</a></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-clipboard align-middle"></i>&nbsp;
                        <span class="align-middle">@lang('messages.my_corner')</a></span>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="far fa-user"></i>&nbsp; {{ Auth::user()->firstname }}
                        {{ Auth::user()->lastname }}<span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profile') }}">
                            <i class="far fa-user-circle"></i>&nbsp; @lang('messages.user_profile')
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off"></i>&nbsp; @lang('messages.user_logout')
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
