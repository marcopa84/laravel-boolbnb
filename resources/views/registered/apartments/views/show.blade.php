@extends('layouts.layout')

@section('main')
<div class="container layout-views">
    @dd($views);
    @if (!count($views))
        Ancora nessuna visualizzazione dell'appartamento
    @else   
        <canvas id="myChart"></canvas>
    @endif
</div>

@endsection