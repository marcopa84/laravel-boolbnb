@extends('layouts.layout')

@section('main')
<div class="container layout-apartment my-5">
   <div class="main-content">
      <div class="apartment-title">
         <h1>{{$apartment->title}}</h1>
      </div>
      <img src="{{asset($apartment->featured_image)}}" title="Immagine in evidenza">
      <h4 class="apartment-desc-title">Descrizione</h4>
      <p class="apartment-desc-text lead">{{$apartment->description}}
         Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint harum unde, quo saepe dicta quisquam illo excepturi molestias non voluptatum id minima aut dolor repellendus nam. Repellendus, reiciendis beatae. Harum? adipisicing elit. Sint harum unde, quo saepe dicta quisquam illo excepturi molestias non voluptatum id minima aut dolor repellendus nam. Repellendus, reiciendis beatae. Harum? adipisicing elit. Sint harum unde, quo saepe dicta quisquam illo excepturi molestias non voluptatum id minima aut dolor repellendus nam. Repellendus, reiciendis beatae. Harum? adipisicing elit. Sint harum unde, quo saepe dicta quisquam illo excepturi molestias non voluptatum id minima aut dolor repellendus nam. Repellendus, reiciendis beatae. Harum? adipisicing elit. Sint harum unde, quo saepe dicta quisquam illo excepturi molestias non voluptatum id minima aut dolor repellendus nam. Repellendus, reiciendis beatae. Harum? adipisicing elit. Sint harum unde, quo saepe dicta quisquam illo excepturi molestias non voluptatum id minima aut dolor repellendus nam. Repellendus, reiciendis beatae. Harum?
      </p>

      <div class="apartment-details">
         <h4 class="apartment-details-title my-4">Caratteristiche</h4>
         <div class="apartment-details-list" role="list">
            <span>Numero stanze:<i class="fas fa-expand"></i> {{$apartment->rooms_number}}</span>
            <span>Numero minimo posti letto:<i class="fas fa-bed"></i> {{$apartment->beds_number}}</span>
            <span>Numero bagni:<i class="fas fa-bath"></i> {{$apartment->bathrooms_number}}</span>
            <span>Prezzo:<i class="fas fa-money-bill-alt"></i> {{$apartment->price}}</span>
         </div>
         
      </div>

      <div class="apartment-features">
         <h4 class="apartment-features-title">Servizi aggiuntivi</h4>
         <div class="apartment-features-list">
            @forelse ($apartment->features as $feature)
            @if ($feature->id == 1)
            <span><i class="fas fa-wifi"></i> Wi-Fi</span>
            @endif
            @if ($feature->id == 2)
               <span><i class="fas fa-parking fa-1.5x"></i> Posto auto</span>
            @endif
            @if ($feature->id == 3)
               <span><i class="fas fa-swimmer"></i> Piscina</span>
            @endif
            @if ($feature->id == 4)
               <span><i class="fas fa-concierge-bell"></i> Portineria</span>
            @endif
            @if ($feature->id == 5)
               <span><i class="fas fa-hot-tub"></i> Sauna</span>
            @endif
            @if ($feature->id == 6)
               <span><i class="fas fa-water"></i> Vista mare</span>
            @endif
            @empty
               <p>Nessun servizio aggiuntivo offerto.</p>
            @endforelse

         </div>
         <h4 class="apartment-features-title my-4">Mappa</h4>
         <div id="map" data-long="{{$apartment->longitude}}" data-lat="{{$apartment->latitude}}">


         </div>
      </div>
   </div> <!-- / main-content -->
   <aside class="sidebar">

   </aside> <!-- / sidebar -->
</div>


@endsection
