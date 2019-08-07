<nav class="navbar navbar-expand-md navbar-icon-top navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/logo_small_navbar.png') }}" alt="logo">
            @lang('messages.krasojizda_name')
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
                    <a class="nav-link" href="#"><i class="fas fa-map-marker-alt"></i>&nbsp;
                        @lang('messages.our_places')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-heart"></i>&nbsp;
                        @lang('messages.life_events')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('important-days.index') }}"><i class="far fa-calendar-alt"></i>&nbsp;
                        @lang('messages.important_days')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-pencil-alt"></i>&nbsp;
                        @lang('messages.blog')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-clipboard"></i>&nbsp;
                        @lang('messages.my_corner')</a>
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
