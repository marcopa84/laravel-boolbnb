@extends('layouts.layout')

@section('main')
<div class="container layout-apartment">
   <div class="main-content apartment-show">

      <div class="apartment-header">
         <div class="apartment-title">
            <h1>{{$apartment->title}}</h1>
         </div>
            
         <div class="apartment-price">
            <h5 class="apartment-price-label">Prezzo per notte: €{{$apartment->price}}</h5>
            <!-- <p class="lead">€{{$apartment->price}}</p> -->
         </div>
      </div>
      
      
      
      <img src="{{asset($apartment->featured_image)}}" title="Immagine in evidenza">
      <h5 class="apartment-desc-title">Descrizione</h5>
      <p class="apartment-desc-text">{{$apartment->description}}
         Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint harum unde, quo saepe dicta quisquam illo excepturi molestias non voluptatum id minima aut dolor repellendus nam. Repellendus, reiciendis beatae. Harum? adipisicing elit. Sint harum unde, quo saepe dicta quisquam illo excepturi molestias non voluptatum id minima aut dolor repellendus nam. Repellendus, reiciendis beatae. Harum? adipisicing elit. Sint harum unde, quo saepe dicta quisquam illo excepturi molestias non voluptatum id minima aut dolor repellendus nam. Repellendus, reiciendis beatae. Harum? adipisicing elit. Sint harum unde, quo saepe dicta quisquam illo excepturi molestias non voluptatum id minima aut dolor repellendus nam. Repellendus, reiciendis beatae. Harum? adipisicing elit. Sint harum unde, quo saepe dicta quisquam illo excepturi molestias non voluptatum id minima aut dolor repellendus nam. Repellendus, reiciendis beatae. Harum? adipisicing elit. Sint harum unde, quo saepe dicta quisquam illo excepturi molestias non voluptatum id minima aut dolor repellendus nam. Repellendus, reiciendis beatae. Harum?
      </p>

      <section class="apartment-details">
         <h5 class="apartment-details-title my-4">Caratteristiche</h5>
         <div class="apartment-details-list" role="list">
            <span>Numero stanze:<i class="fas fa-expand"></i> {{$apartment->rooms_number}}</span>
            <span>Numero posti letto:<i class="fas fa-bed"></i> {{$apartment->beds_number}}</span>
            <span>Numero bagni:<i class="fas fa-bath"></i> {{$apartment->bathrooms_number}}</span>
         </div>

      </section>

      <section class="apartment-features">
         <h5 class="apartment-features-title">Servizi aggiuntivi</h5>
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
      </section>
      <section class="apartment-map">
         <h5 class="apartment-features-title my-4">Mappa</h5>
         <div id="map" data-long="{{$apartment->longitude}}" data-lat="{{$apartment->latitude}}">


         </div>
      </section>
   </div> <!-- / main-content -->
   <aside class="sidebar">
      <div class="sidebar-content">
         <div class="sidebar-message">
            <h6 class="message-title"><i class="fas fa-envelope icon"></i> Contatta il proprietario</h6>
            <form action="{{route('message.store', $apartment)}}" method="POST">
               @csrf 
               @method('POST')
               {{-- <input type="hidden" name="apartment_id" value="{{$apartment->id}}"> --}}
               
               <!-- Form-group -->
               <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control" type="email" name="email" value="@auth{{Auth::user()->email}}@endauth">
               </div>
               <!-- Form-group -->
               <div class="form-group">
                  <label for="content">Messaggio</label>
                  <textarea class="form-control" name="content" cols="30" rows="10">Salve, vorrei maggiori informazioni su questo appartamento.</textarea>
               </div>
               <button class="btn btn-dark" type="submit">Invia</button>
            </form>
         </div>
      </div>
   </aside> <!-- / sidebar -->
</div>

@endsection