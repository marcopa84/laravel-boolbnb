<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm primary fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" title="BoolBnb">
                    BOOLBNB
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav-left navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{asset('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/registered') }}">Dashboard <span class="sr-only">(current)</span></a>
                        </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav-right navbar-nav ml-4">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img class="nav-avatar-img" src="{{ asset(Auth::user()->avatar) }}" alt="Immagine del profilo">
                                    @if (!empty(Auth::user()->name))
                                        {{ Auth::user()->name }}
                                    @else
                                        {{ Auth::user()->email }}
                                    @endif
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('registered.index') }}">
                                        {{ __('Dashboard') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('registered.apartments.index') }}">
                                        {{ __('I tuoi appartamenti') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('registered.apartments.create') }}">
                                        {{ __('Aggiungi nuovo appartamento') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

    @yield('header')
</header>
