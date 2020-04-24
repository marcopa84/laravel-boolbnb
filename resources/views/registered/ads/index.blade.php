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
                     @if ($apartment->bought_ads->contains($apartment->id))
                        <select>
                        @foreach ($apartment->bought_ads as $ad)
                           <option>Inizio sponsorizzazione: {{$ad->start_date}} fine sponsorizzazione: {{$ad->end_date}}</option>
                        @endforeach
                        </select>
                     @endif
                     
                  </div>
                  <div class="card-dash-buttons">
                     <a href="{{route('registered.ads.create', $apartment)}}"><button class="btn btn-dark">Inserisci sponsorizzazione</button></a>
                  </div>
               </div>
            </div>
            @endforeach
         @endif
      </div>            
   </div>
</div>   
@endsection