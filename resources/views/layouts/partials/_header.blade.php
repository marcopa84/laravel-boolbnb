   <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
         <div class="container">
            <a class="navbar-brand" href="{{asset('index.php')}}">BOOLBNB</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
               <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <!-- Right Side Of Navbar -->
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="{{asset('index.php')}}">Home <span class="sr-only">(current)</span></a>
                  </li>
                  @if (Route::has('login'))
                  <li class="nav-item">
                  @auth
                     <a class="nav-link" href="{{ url('/home') }}">Dashboard <span class="sr-only">(current)</span></a>
                  @else
                     <a class="nav-link" href="{{ route('login') }}">Accedi <span class="sr-only">(current)</span></a>
                     @if (Route::has('register'))
                     <li class="nav-item">
                        <a class="nav-link" href="{{ url('register') }}">Registrati <span class="sr-only">(current)</span></a>
                     </li>
                     @endif
                     @endauth
                  </li>
                  @endif
               </ul>

               <!-- Authentication Links -->
               <ul class="navbar-nav ml-4">
                  @auth
                  <li class="nav-item dropdown">
                     <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                     </a>

                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                  @endauth
               </ul>
            </div>
         </div>
      </nav>
      @yield('header')
   </header>      