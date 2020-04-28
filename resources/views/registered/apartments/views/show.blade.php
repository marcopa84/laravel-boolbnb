@extends('layouts.layout')

@section('main')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <div class="container layout-views">

        {!! $chart->container() !!}
        


        {!! $chart->script() !!}
       {{--  @if (!count($views))
            Ancora nessuna visualizzazione dell'appartamento
        @else   
            <canvas id="myChart"></canvas>
        @endif --}}
    </div>
@endsection