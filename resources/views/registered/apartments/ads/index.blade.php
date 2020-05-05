@php
    use Carbon\Carbon;
@endphp
@extends('layouts.layout')
@section('main')
<div class="container my-5">
   <div class="row">
      <div class="col-12">
         @if (empty($apartments))
            <div class="alert alert-info" role="alert">
               <p>Non hai appartamenti registrati!</p>
            </div>
         @else
            @foreach ($apartments as $apartment)
            <div class="card dash">
               <div class="card-image">
                  <img class="card-img-top" src="{{asset($apartment->featured_image)}}" alt="Immagine di anteprima dell'appartamento">
               </div>
               <div class="card-body">
                  <div class="card-body-text">
                     <h3 class="card-title">{{$apartment->title}}</h3>
                     <p class="card-text lead">{{$apartment->address}}</p>
                  </div>
                  
                  <div class="card-body-text">
                     @if (count($apartment->bought_ads) != 0)
                        <select>
                        @foreach ($apartment->bought_ads as $ad)
                           @if ($ad->end_date > now())
                              <option>Inizio sponsorizzazione: {{Carbon::createFromDate($ad->start_date)->format('d-m-Y')}} fine sponsorizzazione: {{Carbon::createFromDate($ad->end_date)->format('d-m-Y')}}</option>
                           @endif
                        @endforeach
                        </select>
                     @endif
                  </div>
                  <div class="card-dash-buttons">
                     <a href="{{route('registered.ads.create', $apartment)}}"><button class="btn btn-dark mt-3">Inserisci sponsorizzazione</button></a>
                  </div>
               </div>
            </div>
            @endforeach
         @endif
      </div>            
   </div>
</div>   
@endsection