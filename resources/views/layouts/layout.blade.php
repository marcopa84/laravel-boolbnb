@include('layouts.partials._head')
@include('layouts.partials._header')


<main>
   {{-- sessione messaggi --}}
   @if (session('message'))
   <div class="alert alert-success">{{ session('message') }}</div>
   @endif
   @if (session('error'))
   <div class="alert alert-danger">{{ session('error') }}</div>
   @endif
   {{-- sessione messaggi --}}


   @yield('main')
</main>

@include('layouts.partials._footer')
