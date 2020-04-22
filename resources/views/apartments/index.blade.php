@extends('layouts.layout')

@section('main')
<div class="container my-5">
   <div class="row">
      <div class="col-12">
            <div id="apartments_filter">
               <div class="form-group">
                  <label for="rooms_number">Stanze minime</label>
                  <input id="rooms_number" class="form-control" type="number" min="1" name="rooms_number" value="{{ old('rooms_number') }}" placeholder="N° stanze minime">
               </div>
               <div class="form-group">
                  <label for="beds_number">Letti minimi</label>
                  <input id="beds_number" class="form-control" type="number" name="beds_number" value="{{ old('beds_number') }}" min="1" placeholder="N° letti minimi">
               </div>
               <div class="form-group">
                  <label for="size">Servizi aggiuntivi</label>
                     <ul id="features" class="list-inline">
                        @foreach ($features as $feature)
                        <li class="list-inline-item btn btn-outline-dark">
                           <input type="checkbox" name="features[]" value="{{$feature->id}}"
                           @if(!empty(old('features')))
                              @for($i = 0; $i < count(old('features')); $i++ )
                                 @if(old('features')[$i] == $feature->id) {{'checked'}}
                                 @endif
                              @endfor
                              @endif >
                           <span>{{$feature->description}}</span>
                        </li>
                        @endforeach
                     </ul>
               </div>
            </div>

               
            <form action="{{route('api.apartments.index')}}" method="get">
               @method('GET')
               @csrf
               <input type="hidden" name="latitude" value="{{$latitude}}">
               <input type="hidden" name="longitude" value="{{$longitude}}">
               <div class="form-group">
                  <select name="radius" id="">
                     <option value="20" selected>20 Km</option>
                     <option value="40">40 Km</option>
                     <option value="60">60 Km</option>
                  </select>
               </div>
               <div class="row">
                  <div class="col">
                     <button type="submit" class="btn btn-dark" title="Cerca appartamenti">
                     <i class="fas fa-search"></i><span>Cerca</span>
                     </button>
                  </div>
               </div>
            </form>
      </div>
 
      <div class="col-12">
         @if (empty($filteredApartments))
            <div class="alert alert-info" role="alert">
               <p>Non ci sono appartamenti disponibili</p>
            </div>
         @else 
            @foreach ($filteredApartments as $apartment)
            <div class="card dash" data-beds="{{$apartment->beds_number}}" data-rooms="{{$apartment->rooms_number}}" data-features="{{$apartment->features}}">
               <div class="card-image">
                  <img class="card-img-top" src="{{asset($apartment->featured_image)}}" alt="Immagine di anteprima dell'appartamento">
               </div>
               <div class="card-body">
                  <div class="card-body-text">
                     <h3 class="card-title">{{$apartment->title}}</h3>
                     <p class="card-text lead">{{$apartment->address}}</p>
                     <p class="card-distance">{{$apartment->distance}}km</p>
                  </div>
                  <div class="card-dash-buttons">
                     <a href="{{route('apartments.show', $apartment)}}"><button class="btn btn-dark">Visualizza</button></a>
                     </form>
                  </div>
               </div>
            </div>
            @endforeach
         @endif
      </div>
   </div>
</div>

@endsection
