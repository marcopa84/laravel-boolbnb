@extends('layouts.layout')

<!-- {{-- <ul>
   <li>{{$apartment->title}}
      <ul>
         <li>{{$apartment->description}}</li>
         <li>{{$apartment->beds_number}}</li>
         <li>{{$apartment->rooms_number}}</li>
         <li>{{$apartment->bathrooms_number}}</li>
         <li>{{$apartment->price}}</li>
         <li>{{$apartment->size}}</li>
         <li>{{$apartment->address}}</li>
         <li>{{$apartment->latitude}}</li>
         <li>{{$apartment->longitude}}</li>
         <li><img src="{{asset($apartment->featured_image)}}" alt="{{$apartment->title}}" class="img-thumbnail"></li>
         <li>{{$apartment->visible}}</li>
      </ul>
   </li>
</ul> --}} -->

@section('main')
<div class="container layout-apartment my-5">
   <div class="main-content">
      <h1>{{$apartment->title}}</h1>
      <img src="{{asset($apartment->featured_image)}}" title="Immagine in evidenza">
      <h4 class="apartment-desc-title">Descrizione</h4>
      <p class="apartment-desc-text lead">{{$apartment->description}}</p>

      <div class="apartment-features">
         <h4 class="apartment-features-title">Servizi</h4>
         <div class="apartment-features-list">
            @if ($apartment->features->has(0))
               <span><i class="fas fa-wifi"></i> WiFi</span>
            @endif
            @if ($apartment->features->has(1))
               <span><i class="fas fa-parking fa-1.5x"></i> Posto auto</span>
            @endif
            @if ($apartment->features->has(2))
               <span><i class="fas fa-swimmer"></i> Piscina</span>
            @endif
            @if ($apartment->features->has(3))
               <span><i class="fas fa-concierge-bell"></i> Portineria</span>
            @endif
            @if ($apartment->features->has(4))
               <span><i class="fas fa-hot-tub"></i> Sauna</span>
            @endif
            @if ($apartment->features->has(5))
               <span><i class="fas fa-water"></i> Vista mare</span>
            @endif
         </div>
      </div>
   </div> <!-- / main-content -->
   <div class="sidebar">
      Sidebar
   </div> <!-- / sidebar -->
</div>

@endsection