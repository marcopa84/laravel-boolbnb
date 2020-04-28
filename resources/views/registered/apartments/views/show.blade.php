@extends('layouts.layout')

@section('main')
  <div class="container layout-views">
    @if (!isset($chart))
      <div class="alert alert-info">Ancora nessuna visualizzazione dell'appartamento</div>
    @else
      <div class="mt-5">
        {!! $chart->container() !!}
        {!! $chart->script() !!}
      </div>
    @endif
  </div>
@endsection
