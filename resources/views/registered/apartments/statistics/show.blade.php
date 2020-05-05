@extends('layouts.layout')

@section('main')
  <div class="container layout-views">
    <div class="row">
      <div class="col-md-6">
        @if (!isset($views))
         <div class="alert alert-info">Ancora nessuna visualizzazione dell'appartamento</div>
        @else
          <div class="mt-5">
            {!! $views->container() !!}
            {!! $views->script() !!}
          </div>
        @endif
        <div class="col text-center mt-3">
          @foreach($totalViews as $views)
            <h4 class="counter">Totale visualizzazioni: <span class="badge badge-primary">{{$views}}</span></h4>
          @endforeach
        </div>
      </div>

      <div class="col-md-6">
        @if (!isset($messages))
          <div class="alert alert-info">Ancora nessun messaggio ricevuto per l'appartamento</div>
        @else
          <div class="mt-5">
            {!! $messages->container() !!}
            {!! $messages->script() !!}
          </div>
        @endif
        <div class="col text-center mt-3">
          @foreach($totalMessages as $messages)
            <h4 class="counter">Totale messaggi: <span class="badge badge-primary">{{$messages}}</span></h4>
          @endforeach
        </div>

      </div>
    </div>
  </div>
@endsection
