@extends('layouts.layout')

@section('main')
<div class="container my-5">
   <div class="row">
      <div class="col">
         <div class="add-apartment mb-4 d-flex justify-content-end w-100">
            <a href="{{route('registered.apartments.create')}}"><span>Aggiungi un appartamento</span><button class="btn btn-outline-dark ml-2"><i class="fas fa-plus"></i></button></a>
         </div>
      </div>

   </div>
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
                  <div class="card-dash-buttons">
                     <a href="{{route('registered.apartments.show', $apartment)}}"><button class="btn btn-dark">Visualizza</button></a>
                     <a href="{{route('registered.apartments.edit', $apartment)}}"><button class="btn btn-dark">Modifica</button></a>
                     <a href="{{route('registered.views.show', $apartment)}}"><button class="btn btn-dark">Statistiche</button></a>
                     <form class="d-inline" action="{{route('registered.apartments.destroy', $apartment)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Cancella</button>
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