   <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <a class="navbar-brand" href="{{route('home')}}">BOOLBNB</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
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

               
               
               <li class="nav-item active">
                  <a class="nav-link btn btn-outline-secondary px-3" href="{{route('registered.apartments.create')}}">+ <span class="sr-only">(current)</span></a>
               </li>
            </ul>
         </div>
      </nav>
      @yield('header')
   </header>      