@include('layouts.partials._head')
@include('layouts.partials._header')
   
   {{-- QUESTI ANDRANNO PER TUTTE LA PAGINE --}}
   @if (session('message'))
   <div class="alert alert-success">{{ session('message') }}</div>
   @endif
   @if (session('error'))
   <div class="alert alert-danger">{{ session('error') }}</div>
   @endif


   @if ($errors->any())
   <div class="alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   @endif
   {{-- QUESTI ANDRANNO PER TUTTE LA PAGINE --}}
   
   <main>
      @yield('main')
   </main>
   
@include('layouts.partials._footer')