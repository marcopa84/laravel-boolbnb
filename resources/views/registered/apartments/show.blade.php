@extends('layouts.layout')

@section('main')
<div class="container layout-apartment my-5">
   <div class="main-content">
      <h1>{{$apartment->title}}</h1>
      <img src="{{asset($apartment->featured_image)}}" title="Immagine in evidenza">
      <h4 class="apartment-desc-title">Descrizione</h4>
      <p class="apartment-desc-text lead">{{$apartment->description}}
         Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint harum unde, quo saepe dicta quisquam illo excepturi molestias non voluptatum id minima aut dolor repellendus nam. Repellendus, reiciendis beatae. Harum? adipisicing elit. Sint harum unde, quo saepe dicta quisquam illo excepturi molestias non voluptatum id minima aut dolor repellendus nam. Repellendus, reiciendis beatae. Harum? adipisicing elit. Sint harum unde, quo saepe dicta quisquam illo excepturi molestias non voluptatum id minima aut dolor repellendus nam. Repellendus, reiciendis beatae. Harum? adipisicing elit. Sint harum unde, quo saepe dicta quisquam illo excepturi molestias non voluptatum id minima aut dolor repellendus nam. Repellendus, reiciendis beatae. Harum? adipisicing elit. Sint harum unde, quo saepe dicta quisquam illo excepturi molestias non voluptatum id minima aut dolor repellendus nam. Repellendus, reiciendis beatae. Harum? adipisicing elit. Sint harum unde, quo saepe dicta quisquam illo excepturi molestias non voluptatum id minima aut dolor repellendus nam. Repellendus, reiciendis beatae. Harum?
      </p>

      <div class="apartment-features">
         <h4 class="apartment-features-title">Servizi</h4>
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
                Nessun servizio aggiuntivo offerto.
            @endforelse
            
         </div>
      </div>
   </div> <!-- / main-content -->
   <div class="sidebar">
      Sidebar
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque, sint dicta exercitationem accusamus est, quisquam ab, autem sit nobis assumenda aliquid consectetur et doloremque molestias nostrum tempora tempore amet.lorem
      Sidebar
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque, sint dicta exercitationem accusamus est, quisquam ab, autem sit nobis assumenda aliquid consectetur et doloremque molestias nostrum tempora tempore amet.lorem
      Sidebar
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque, sint dicta exercitationem accusamus est, quisquam ab, autem sit nobis assumenda aliquid consectetur et doloremque molestias nostrum tempora tempore amet.lorem
      Sidebar
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque, sint dicta exercitationem accusamus est, quisquam ab, autem sit nobis assumenda aliquid consectetur et doloremque molestias nostrum tempora tempore amet.lorem
      Sidebar
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque, sint dicta exercitationem accusamus est, quisquam ab, autem sit nobis assumenda aliquid consectetur et doloremque molestias nostrum tempora tempore amet.lorem
      Sidebar
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque, sint dicta exercitationem accusamus est, quisquam ab, autem sit nobis assumenda aliquid consectetur et doloremque molestias nostrum tempora tempore amet.lorem
      Sidebar
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque, sint dicta exercitationem accusamus est, quisquam ab, autem sit nobis assumenda aliquid consectetur et doloremque molestias nostrum tempora tempore amet.lorem
      Sidebar
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque, sint dicta exercitationem accusamus est, quisquam ab, autem sit nobis assumenda aliquid consectetur et doloremque molestias nostrum tempora tempore amet.lorem
      Sidebar
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque, sint dicta exercitationem accusamus est, quisquam ab, autem sit nobis assumenda aliquid consectetur et doloremque molestias nostrum tempora tempore amet.lorem
      Sidebar
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque, sint dicta exercitationem accusamus est, quisquam ab, autem sit nobis assumenda aliquid consectetur et doloremque molestias nostrum tempora tempore amet.lorem
      Sidebar
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque, sint dicta exercitationem accusamus est, quisquam ab, autem sit nobis assumenda aliquid consectetur et doloremque molestias nostrum tempora tempore amet.lorem
      Sidebar
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque, sint dicta exercitationem accusamus est, quisquam ab, autem sit nobis assumenda aliquid consectetur et doloremque molestias nostrum tempora tempore amet.lorem
      Sidebar
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque, sint dicta exercitationem accusamus est, quisquam ab, autem sit nobis assumenda aliquid consectetur et doloremque molestias nostrum tempora tempore amet.lorem
      Sidebar
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia neque, sint dicta exercitationem accusamus est, quisquam ab, autem sit nobis assumenda aliquid consectetur et doloremque molestias nostrum tempora tempore amet.lorem
   </div> <!-- / sidebar -->
</div>

@endsection