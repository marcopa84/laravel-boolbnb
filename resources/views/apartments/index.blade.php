@extends('layouts.layout')

@section('main')
<div class="container my-5">
   <div class="row">
      <div class="col-12">
         @if (empty($filteredApartments))
            <div class="alert alert-info" role="alert">
               <p>Non ci sono appartamenti disponibili</p>
            </div>
         @else
            @foreach ($filteredApartments as $apartment)
            <div class="card dash">
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
