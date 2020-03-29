<nav class="navbar navbar-expand-lg navbar-icon-top navbar-dark shadow-sm">
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

            @if (Auth::user()->krasojizda_id !== null)
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('our-places.index') }}"><i
                            class="fas fa-map-marker-alt align-middle"></i>&nbsp;
                        <span class="align-middle">@lang('messages.our_places')</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a id="events-dropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="far fa-calendar-alt"></i>&nbsp; @lang('messages.events')<span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="events-dropdown">
                        <a class="dropdown-item" href="{{ route('important-days.index') }}">
                            <i class="far fa-star"></i>&nbsp; @lang('messages.important_days')
                        </a>
                        <a class="dropdown-item" href="{{ route('life-events.index') }}">
                            <i class="far fa-heart"></i>&nbsp; @lang('messages.life_events')
                        </a>
                    </div>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('life-events.index') }}"><i
                    class="far fa-heart align-middle"></i>&nbsp;
                <span class="align-middle">@lang('messages.life_events')</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('important-days.index') }}"><i
                            class="far fa-calendar-alt align-middle"></i>&nbsp;
                        <span class="align-middle">@lang('messages.important_days')</span></a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('conversations.index') }}"><i
                            class="far fa-comments align-middle"></i>&nbsp;
                        <span class="align-middle">@lang('messages.conversations')</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-film align-middle"></i>&nbsp;
                        <span class="align-middle">@lang('messages.entertainment')</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.index') }}"><i
                            class="fas fa-pencil-alt align-middle"></i>&nbsp;
                        <span class="align-middle">@lang('messages.blog')</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-clipboard align-middle"></i>&nbsp;
                        <span class="align-middle">@lang('messages.my_corner')</span></a>
                </li>
            </ul>
            @endif

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="profile-dropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="far fa-user"></i>&nbsp; {{ Auth::user()->firstname }}
                        {{ Auth::user()->lastname }}<span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profile-dropdown">
                        <a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}">
                            <i class="far fa-user-circle"></i>&nbsp; @lang('messages.profile')
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